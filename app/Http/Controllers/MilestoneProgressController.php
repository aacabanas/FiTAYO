<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MilestoneProgress;
use Illuminate\Support\Facades\Auth;

class MilestoneProgressController extends Controller
{
    //
    public function create_request(Request $request){
        $json = $request->json();
        
        return back();
        
    }
}
