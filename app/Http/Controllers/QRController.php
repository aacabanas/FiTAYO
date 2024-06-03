<?php

namespace App\Http\Controllers;

use App\Models\checkins;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        if(checkins::where("date",Carbon::now()->format("Y-m-d"))->where("user_id",$request->cinid)->first()!=null){return back();}
/*         dd([
            "user_id" => $request->id,
            "username" => $request->username,
            "date" => date("Y-m-d"),
            "time_in" => date("h:i:sa")
        ]); */
        checkins::create([
            "user_id" => $request->cinid,
            "username" => $request->cinusername,
            "date" => Carbon::now()->format("Y-m-d"),
            "time_in" => Carbon::now()->format("h:i:m"),
            "time_out"=>null
        ]);
        return back();
    }
    public function check_out(Request $request){
        $request->validate([
            "coid" =>  "required",
            "cousername" => "required"
        ]);
        if(checkins::where("date",Carbon::now()->format("Y-m-d"))->where("user_id",$request->coid)->first()->time_out!=null){
            return back();
        }
        checkins::where("date",Carbon::now()->format("Y-m-d"))->where("user_id",$request->coid)->update(["time_out"=>Carbon::now()->format("h:i:m")]);
        return back();
    }
    public function get($id){
        return response()->file(public_path("qrcodes\\$id.png"));
    }
}
