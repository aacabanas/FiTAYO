<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MilestoneProgress;
use App\Models\user_milestones;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MilestoneProgressController extends Controller
{
    //
    public function request(Request $request)
    {   
       
        if(Auth::check()&&Auth::user()->user_type=="user"){
            $prog = "";
            if($request->get("mode")=="work"){
                MilestoneProgress::create([
                    'lift'=>$request->get("lift"),'reps'=>$request->get("reps"),'username'=>Auth::user()->username,'date'=>Carbon::now()->toDateString(),'action'=>"+20",'request_time'=>Carbon::now()->toTimeString()
                ]);
            }
            if($request->get("mode")=="lazy"){
                MilestoneProgress::create([
                    'lift'=>$request->get("lift"),'reps'=>$request->get("reps"),'username'=>Auth::user()->username,'date'=>Carbon::now()->toDateString(),'action'=>"-20",'request_time'=>Carbon::now()->toTimeString()
                ]);
            }
            return back();         
        }
        
    }
    public function approve($id)
    {
        MilestoneProgress::where("id",$id)->update(["status","approved"]);
        $progress = MilestoneProgress::where("id",$id)->get()->first();
        $username = $progress->username;
        $lift = $progress->lift;
    }
    public function reject($id)
    {
        if (!Auth::check()) {
            abort(404);
        }
        $is_request = MilestoneProgress::whereDate("date", Carbon::now()->toDateString())->where('status', 'pending')->where('id', $id)->count() == 1;
        if ($is_request) {
            MilestoneProgress::where('id', $id)->update(['status' => 'rejected']);
            return back();
        }
        abort(404);
    }
    public function get_pending()
    {
        return response()->json(MilestoneProgress::whereDate("date", Carbon::now()->toDateString())->where('status', 'pending')->get());
    }
}