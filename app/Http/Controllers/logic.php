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
        $username = "jdoee";
        $email = "jdoee@jdoe.com";
        $password = "thissucks";
        $type = "user";
        $user = new User();
        $user->username = $username;
        $user->user_email = $email;
        $user->password = Hash::make($password);
        $user->user_type = $type;
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
        return redirect()->intended(route('login'))->with(["error"=>"wrong"]);
        
    }
    public function registerPost(Request $request){
        //
    }
}
