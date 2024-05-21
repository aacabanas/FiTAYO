<?php
use App\Models\user_membership;
use App\Models\user_profile;
class BMI{
    public static $bmi;
    private $weight;
    private $height;
    public function __construct($height,$weight){
        $this->height = $height;
        $this->weight = $weight;
        self::$bmi= round(($weight / (($height * 12) * ($height * 12)) * 703), 2);
    }
    public static function type(){
        
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
class converter
{
    private static $CONVERT_EQUIVALENTS = [
        "credential" => [
            "regUsername"=>"username",
            "regPassword"=>"password",
            "regEmail"=>"email",
            "regUserType" => "user_type"
        ],
        "profile" => [
            "regFName"=>"firstName",
            "regLName"=>"lastName",
            "regContactDetails"=>"contactDetails",
            "regBirthdate" => "birthdate",
            "regAddressNum"=>"address_num",
            "regAddressStreet" =>"address_street",
            "regAddressCity"=>"address_city",
            "regAddressRegion"=>"address_region",
            "regProfileBio" => "profileBio"
        ],
        "membership" => [
            "regMem"=>"membership_type",
            "regMembershipPlan"=>"membership_plan",
            "regStartDate"=>"start_date",
            "regPaymentStatus"=>"payment_status",
            "regTrainer"=>"Trainer"
        ],
        "editCredential" => [
            "viewEmail" => "email",
            "viewUsername" => "username"
        ],
        "editProfile" => [
            "viewFName" => "firstName",
            "viewLName" => "lastName",
            "viewContactDetails" => "contactDetails",
            "viewBirthdate" => "birthdate",
            "viewAddressNum" => "address_num",
            "viewAddressStreet" => "address_street",
            "viewAddressCity" => "address_city",
            "viewAddressRegion" => "address_region",
            "viewProfileBio" => "profileBio"
        ],
        "editMembership" => [
            "viewMembershipType" => "membership_type",
            "viewMembershipPlan" => "membership_plan",
            "viewMembershipDesc" => "membership_desc",
            "viewStartDate" => "start_date",
            "viewExpiryDate" => "expiry_date",
            "viewNextPayment" => "next_payment",
            "viewPaymentStatus" => "payment_status",
            "viewTrainer" => "Trainer"
        ],
        "editAssessment" => [
            "viewHeight" => "height",
            "viewWeight" => "weight",
            "viewBMI" => "bmi",
            "viewBMIType" => "bmi_classification",
            "viewHasIllness" => "hasIllness",
            "viewHasInjuries" => "hasInjuries",
            "viewMedicalHistory" => "medical_history"
        ]
        
    ];
    public static function get_converted($for){
        $conv = self::$CONVERT_EQUIVALENTS[$for];
        $data = [];
        foreach($conv as $k=>$v){
            array_push($data, $v);
        }
        return $data;
    }
}
class configurations
{
    private static $CONFIG = [
        "credential" => [
            "regUsername",
            "regPassword",
            "regEmail",
            "regUserType"
        ],
        "profile" => [
            "regFName",
            "regLName",
            "regContactDetails",
            "regBirthdate",
            "regAddressNum",
            "regAddressStreet",
            "regAddressCity",
            "regAddressRegion",
            "regProfileBio"
        ],
        "membership" => [
            "regMem",
            "regMembershipPlan",
            "regStartDate",
            "regPaymentStatus",
            "regTrainer"
        ],
        "register" => [
            "regMem" => "required",
            "regFName" => "required",
            "regLName" => "required",
            "regContactDetails" => "required",
            "regBirthdate" => "required",
            "regAddressNum" => "required",
            "regAddressStreet" => "required",
            "regAddressCity" => "required",
            "regAddressRegion" => "required",
            "regProfileBio" => "required",
            "regMembershipPlan" => "required",
            "regStartDate" => "required",
            "regPaymentStatus" => "required",
            "regTrainer" => "required",
            "regUsername" => "required",
            "regPassword" => "required",
            "regEmail" => "required",
            "regUserType" => "required"
        ],
        "editCredential" => [
            "viewEmail" => "required",
            "viewUsername" => "required"
        ],
        "editProfile" => [
            "viewFName" => "required",
            "viewLName" => "required",
            "viewContactDetails" => "required",
            "viewBirthdate" => "required",
            "viewAddressNum" => "required",
            "viewAddressStreet" => "required",
            "viewAddressCity" => "required",
            "viewAddressRegion" => "required",
            "viewProfileBio" => "required"
        ],
        "editMembership" => [
            "viewMembershipType" => "required",
            "viewMembershipPlan" => "required",
            "viewMembershipDesc" => "required",
            "viewStartDate" => "required",
            "viewExpiryDate" => "required",
            "viewNextPayment" => "required",
            "viewTrainer" => "required"
        ],
        "editAssessment" => [
            "viewHeight" => "required",
            "viewWeight" => "required",
            "viewBMI" => "required",
            "viewBMIType" => "required",
            "viewHasIllness" => "required",
            "viewHasInjuries" => "required",
            "viewMedicalHistory" => "required"
        ]
    ];
    public static function get_config($for): array|null
    {
        return isset(self::$CONFIG[$for]) ? self::$CONFIG[$for] : null;
    }

}
if (!function_exists("get_config")) {
    function get_config($for)
    {
        return configurations::get_config($for);
    }
}
if (!function_exists("latest_mem")) {
    function latest_mem()
    {
        return user_membership::where("membership_type", "Member")->orderByDesc("userMem_ID")->first()->userMem_ID;
    }
}
if(!function_exists("extract_data")){
    function extract_data($table,$keys,$unparsed){
        $data = [];
        for($i=0;$i<count($table);$i++){
            $data[$table[$i]] = $unparsed[$keys[$i]];
        }
        return $data;
    }
}
if(!function_exists('isNull')){
    function isNull(mixed $data){
        return $data == null;
    }
}
if(!function_exists('members')){
    function members(){
        $data = [];
        for($_=0;$_<user_membership::count();$_++){
            $prof = user_profile::where("profile_ID", $_ + 1)->first();
            $memb = user_membership::where("userMem_ID", $_ + 1)->first();
            if($memb->membership_type=="Member"){
                array_push(
                    $data,[
                        "ID" => $prof->profile_ID,
                        "firstName" => $prof->firstName,
                        "lastName" => $prof->lastName,
                        "membership_plan" => $memb->membership_plan,
                        "start_date" => $memb->start_date,
                        "expiry_date" => $memb->expiry_date,
                        "payment_status" => $memb->payment_status==1?"Yes":"No"

                    ]
                );
            }
        }
        return $data;
    }
}