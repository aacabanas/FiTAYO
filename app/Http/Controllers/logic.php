<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class logic extends Controller
{
    public function push(){
        //reference for inserting data
        $user = new User();
        $user->username = "sumGuy";
        $user->user_email = 'sguy@example.com';
        $user->password = Hash::make("FITAYO");
        $user->user_type = "user";
        $user->firstName = "Some";
        $user->lastName = "Guy";
        $user->profileBio ="A member who wants to develop muscle";
        $user->contactDetails = "09123456789";
        $user->birthdate = date("Y-m-d", mktime(0,0,0,8,12,2003));
        $user->address_num = "102";
        $user->address_street = "Somewhere Street";
        $user->address_city = "Middle City";
        $user->address_region = "Rainbow";
        $user->height = 5.7;
        $user->weight = 139;
        $user->bmi = ($user->weight/2.2/($user->height*0.3048));
        $user->bmi_classification = "Normal";
        $user->medical_history = "None";
        $user->hasIllness = false;
        $user->hasInjuries = false;
        $user->membership_type = "Premium";
        $user->membership_desc = "Includes all services offered";
        $user->start_date = now();
        $user->expiry_date = date("Y-m-d", mktime(0,0,0,5,30,2024));
        $user->next_payment = date("Y-m-d", mktime(0,0,0,5,12,2024));
        $user->payment_status = true;
        $user->Trainer = "John Wick";
        $user->save();
    }
    
    
    public function account(){
        $credentials = DB::table('user_credentials')->select(['user_ID','username','user_email'])->where('user_email',session()->get('success'));
        $vals = (String) $credentials->get('user_ID');
        echo $vals;
        
        return view("account");
    }
    //data handling + more    
    public function loginPost(Request $request){
        //validate form data
        $request->validate([
            "username"=> "required",
            "password"=> "required",
            
        ]);
        $username = $request->username;
        $password = $request->password;
        //attempt authorization
        if(Auth::attempt(["username"=>$username,"password"=>$password])){
            //get user credentials 
            $user = User::where("username",$username)->first();
            
            return redirect()->intended(route('index'))->with(["user"=>$user->user_type,"name"=>$user->username]);
        }
        //returns to login page with error message
        return redirect()->intended(route('login'))->with(["error"=>"The user \"$username\" is not found in our system"]);
        
    }
    public function registerPost(Request $request){
        //
    }
}
