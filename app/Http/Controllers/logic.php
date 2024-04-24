<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        $credentials = $request->only("username","password");
        if(Auth::attempt($credentials)){
            Session::put("user",userAuth());
            Session::put("logged",true);
            Session::keep(['user','logged']);
            return redirect()->intended(route('index'));
        }
        
        return redirect()->intended(route('login'))->with(["error"=>"The user \"$request->username\" is not found in our system"]);
        
    }
    public function registerPost(Request $request){
        //
        $request->validate([
            'first-name' => 'required|string|max:150',
            'last-name' => 'required|string|max:150',
            'contact-number' => 'required|max:11',
            'address' => 'required|string|max:255',
            'membership-plan' => 'required|string|in:basic,standard,premium',
            'email' => 'required|string|email|max:150|unique:users,user_email',
        ]);
    
        // Create a new user instance and assign validated data directly from the request
        $user = new User();
        $user->firstName = $request->input('first-name');
        $user->lastName = $request->input('last-name');
        $user->contactDetails = $request->input('contact-number');
        $user->address = $request->input('address');
        $user->membership_type = $request->input('membership-plan');
        $user->user_email = $request->input('email');
        $user->password = Hash::make('defaultPassword'); // Ideally, the password should also be input by the user
        $user->start_date = now();
        $user->expiry_date = now()->addMonth();
        $user->save();
    
        return redirect('login')->with('success', 'Member registered successfully!');
    }
}
