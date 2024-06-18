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
    public function create_request(Request $request){
        $request->validate([
            "lift"=>"required",
            "reps"=>"required",
            "progress"=>"required"
        ]);
        $username = Auth::user()->username;
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();

        MilestoneProgress::create([
            'lift' => $request->lift,
            'reps' => $request->reps,
            'username'=>$username,
            'date'=>$date,
            'action'=>$request->progress,
            'request_time' => $time
        ]);
        return back();
        
    }
    public function approve($id){
        if(!Auth::check()){
            abort(404);
        }
        $is_request = MilestoneProgress::whereDate("date",Carbon::now()->toDateString())->where('status','pending')->where('id',$id)->count() == 1;
        if($is_request){
            MilestoneProgress::where('id',$id)->update(['status'=>'approved']);
            $milestone = MilestoneProgress::where('id',$id)->get()->first();
            $exists = user_milestones::where("username",Auth::user()->username)->where("reps",$milestone->reps)->where("lift",$milestone->lift)->count == 1;
            if(!$exists){
                user_milestones::create([
                    'username' => Auth::user()->username,
                    'lift' => $milestone->lift,
                    'reps' => $milestone->reps,
                    'weight' => 20
                ]);
            }
            else{
                if($milestone->action == "+20"){
                    $weight = user_milestones::where("username",Auth::user()->username)->where("reps",$milestone->reps)->where("lift",$milestone->lift)->get()->first()->weight;
                    user_milestones::where("username",Auth::user()->username)->where("reps",$milestone->reps)->where("lift",$milestone->lift)->update(["weight"=>$weight+20]);
                }
                else{
                    $weight = user_milestones::where("username",Auth::user()->username)->where("reps",$milestone->reps)->where("lift",$milestone->lift)->get()->first()->weight;
                    user_milestones::where("username",Auth::user()->username)->where("reps",$milestone->reps)->where("lift",$milestone->lift)->update(["weight"=>$weight-20]);
                }
            }
            return back();
        }
        abort(404);
    }
    public function reject($id){
        if(!Auth::check()){
            abort(404);
        }
        $is_request = MilestoneProgress::whereDate("date",Carbon::now()->toDateString())->where('status','pending')->where('id',$id)->count() == 1;
        if($is_request){
            MilestoneProgress::where('id',$id)->update(['status'=>'rejected']);
            return back();
        }
        abort(404);
    }
    public function get_pending(){
        return response()->json(MilestoneProgress::whereDate("date",Carbon::now()->toDateString())->where('status','pending')->get());
    }
}
