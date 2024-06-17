<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\NonMemberModel;
class NonMemberController extends Controller
{
    //
    public function check_in(Request $request){
        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
        ]);
        NonMemberModel::create([
            "firstname"=> $request->firstname,
            "lastname" => $request->lastname,
            "date" => Carbon::now()->format('Y-m-d'),
            "time_in" => Carbon::now()->format("h:i:m")
        ]);
        return back();
    }
}
