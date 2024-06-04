<?php
use App\Models\checkins;
use App\Models\user_membership;
use App\Models\user_profile;
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
        for ($_ = 0; $_ < user_membership::count(); $_++) {
            $prof = user_profile::where("profile_ID", $_ + 1)->first();
            $memb = user_membership::where("userMem_ID", $_ + 1)->first();
            if($memb == null){continue;}
            if ($memb->membership_type == "Member") {
                array_push(
                    $data,
                    [
                        "ID" => $prof->profile_ID,
                        "firstName" => $prof->firstName,
                        "lastName" => $prof->lastName,
                        "membership_plan" => $memb->membership_plan,
                        "start_date" => $memb->start_date,
                        "expiry_date" => $memb->expiry_date,
                        "payment_status" => $memb->payment_status == 1 ? "Yes" : "No"

                    ]
                );
            }
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