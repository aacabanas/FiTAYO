<?php
use App\Models\checkins;
use App\Models\user_assessment;
use App\Models\user_membership;
use App\Models\user_profile;
use App\Models\user_milestones;
use App\Models\NonMemberModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class BMI
{
    public static $bmi;
    private $weight;
    private $height;
    public function __construct($height, $weight)
    {
        $this->height = $height;
        $this->weight = $weight;
        self::$bmi = round(($weight / (($height * 12) * ($height * 12)) * 703), 2);
    }
    public static function type()
    {

        $category = ["Underweight", "Normal weight", "Overweight", "Obesity"];
        if (self::$bmi < 18.5) {
            return $category[0];
        } else if (self::$bmi <= 24.9) {
            return $category[1];
        } else if (self::$bmi <= 29.9) {
            return $category[2];
        } else {
            return $category[3];
        }
    }
}
if(!function_exists("get_leaderboards")){
    function get_leaderboards(){
        $data = [];
        $ids = File::json(Storage::disk('jsons')->path('lifts_data.json'));
        
        foreach($ids as $k=>$v){
            $milestone = user_milestones::where("lift",$v["lift"])->where("reps", $v["reps"])->whereBetween('date',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->limit(5)->get();
            if($milestone->isEmpty()){
                $t = [
                    "id" => strtolower($k),
                    "weight" => 0,
                    
                ];
                array_push($data,$t);
                continue;
            }
            $t = [
                "id" => strtolower($k),
                "weight" => $milestone->first()->weight
            ];
            array_push($data,$t);
        }
        return $data;
    }
}
if(!function_exists("get_milestones")){
    function get_milestones($username){
        $data = [];
        $ids = File::json(Storage::disk('jsons')->path('lifts_data.json'));
        
        foreach($ids as $k=>$v){
            $milestone = user_milestones::where("username",$username)->where("lift",$v["lift"])->where("reps", $v["reps"])->whereBetween('date',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            if($milestone->isEmpty()){
                $t = [
                    "id" => strtolower($k),
                    "lift" => $v["lift"],
                    "weight" => 0,
                    "reps" => $v["reps"]
                    
                ];
                array_push($data,$t);
                continue;
            }
            $t = [
                "id" => strtolower($k),
                "lift"=>$milestone->first()->lift,
                "weight" => $milestone->first()->weight,
                "reps" => $milestone->first()->reps
            ];
            array_push($data,$t);
        }
        return $data;
    }
}
if (!function_exists("latest_mem")) {
    function latest_mem()
    {
        return user_membership::where("membership_type", "Member")->orderByDesc("userMem_ID")->first()->userMem_ID;
    }
}
if (!function_exists("extract_data")) {
    function extract_data($table, $keys, $unparsed)
    {
        $data = [];
        for ($i = 0; $i < count($table); $i++) {
            $data[$table[$i]] = $unparsed[$keys[$i]];
        }
        return $data;
    }
}
if (!function_exists('isNull')) {
    function isNull(mixed $data)
    {
        return $data == null;
    }
}
if (!function_exists('members')) {
    function members()
    {
        $data = [];
        $users = User::where("user_type","user")->get();
        foreach($users as $user){
            $prof = user_profile::where("user_ID", $user->id)->get()->first();
            $memb = user_membership::where("user_ID", $user->id)->get()->first();
            array_push(
                $data,
                [
                    "ID" => !$user->data_filled? "Unfinished" : $prof->user_ID,
                    "firstName" => !$user->data_filled? "Unfinished" :$prof->firstName,
                    "lastName" => !$user->data_filled? "Unfinished" :$prof->lastName,
                    "membership_plan" => !$user->data_filled? "Unfinished" :$memb->membership_plan,
                    "start_date" => !$user->data_filled? "Unfinished" :$memb->start_date,
                    "expiry_date" => !$user->data_filled? "Unfinished" :$memb->expiry_date,
                    "payment_status" => $user->payment_status ? "Yes" : "No"
                ]);
        }
        
        
        return $data;
    }
}
if(!function_exists('deadlines')){
    function deadlines(){
        $data = [];
        $user = User::get();
        $membership = user_membership::get();
        $profile = user_profile::get();

        for($_=0;$_<count($membership);$_++){
            $use = $user[$_];
            $memb = $membership[$_];
            $prof = $profile[$_];
            if((int)Carbon::now()->diffInDays($memb["expiry_date"]) <= 5){
                array_push($data,[
                    "lname" => $prof["lastName"],
                    "fname" => $prof["firstName"],
                    "deadline" => $memb["expiry_date"],
                    "email" => $use["email"] 
                ]);
            }
            
        }
        return $data;
    }
}
if(!function_exists("non_members")){
    function non_members(){
        $data = [];
        $non_mem = NonMemberModel::where("date",Carbon::now()->format("Y-m-d"))->get();
        for($_=0;$_<count($non_mem);$_++){
            $non = $non_mem[$_];
            array_push($data,[
                "ID" => $_+1,
                "fname" => $non->firstname,
                "lname" => $non->lastname,
                "time" => $non->time_in
            ]);
        }
        return $data;
    }
}
if(!function_exists('token')){
    function token($username){
        return str::random(128);
    }
}
if(!function_exists("generate_json")){
    function generate_json($id,$username){
        Storage::disk('qr')->put("$id.png",QrCode::format('png')->size(200)->errorCorrection('H')->generate(base64_encode(json_encode(["id"=>$id,"username"=>$username]))));
    }
}
if(!function_exists("check_in_count")){
    function check_in_count(){return checkins::where("date",Carbon::now()->format("Y-m-d"))->count();}
}
if(!function_exists("get_top")){
    function get_top($limit = 5){
        $press = ["Bench Press","Deadlift","Squats"];
        $reps = [1,6,12];
        $data = [];
        for($_=0;$_<3;$_++){
            $pre = $press[$_];
            $rep = $reps[$_];
            $dat = [];
            
        }
    }
}
class JSON_DATA{
    private static function json_file(){
        return public_path()."\\json\\Regions\\regions.json";
    }
    
    private static function get_file(){
        return File::json(self::json_file());
    }
    public static function get_regions(){
        $file = self::get_file();
        $regions = [];
        foreach($file as $data){
            array_push($regions,["name" => $data['name'],"code"=>$data['code']]);
        }
        return $regions;
    }
    
    public static function get_cities($region_code){
        $file = self::get_file();
        $cities = [];
        foreach($file as $data){
            if($data['code']==$region_code){
                foreach($data['Cities'] as $data){
                    array_push($cities,["name" => $data['name'],"code"=>$data['code']]);
                }
            }
        }
        return $cities;
    }
    
    public static function get_barangays($region_code,$city_code){
        $file = self::get_file();
        $barangays = [];
        foreach($file as $data){
            if($data['code']==$region_code){
                foreach($data['Cities'] as $data){
                    if($data['code']==$city_code){
                        return $data['Barangays'];
                        
                    }
                }
            }
        }
        return $barangays;
    }
}
