<?php

namespace App\Http\Controllers;

use App\Models\checkins;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class QRController extends Controller
{
    public function show()
    {
        return view('qr_code_page');
    }
    public function check_in(Request $request){
        $request->validate([
            "cinid" => "required",
            "cinusername" => "required"
        ]);
        if(checkins::where("date",Carbon::now()->format("Y-m-d"))->where("user_id",$request->cinid)->first()!=null ){
            Session::put("checked_in",value:"$request->cinusername has already checked-in");
            return back();
        }

        checkins::create([
            "user_id" => $request->cinid,
            "username" => $request->cinusername,
            "date" => Carbon::now()->format("Y-m-d"),
            "time_in" => Carbon::now()->format("h:i:m"),
            "time_out"=>null
        ]);
        return redirect('dashboard');

    }
    public function check_out(Request $request){
        $request->validate([
            "coid" =>  "required",
            "cousername" => "required"
        ]);
        if(isset(checkins::where("date",Carbon::now()->format("Y-m-d"))->where("user_id",$request->coid)->first()->time_out)){
            return back();
        }
        checkins::where("date",Carbon::now()->format("Y-m-d"))->where("user_id",$request->coid)->update(["time_out"=>Carbon::now()->format("h:i:m")]);
        return back()->with(["check_out"=>"$request->cousername checked-out"]);
    }
    public function get($id){
        if(Auth::check()){
            return response()->file(public_path("qrcodes\\$id.png"));
        }
        abort(404);
    }
}
