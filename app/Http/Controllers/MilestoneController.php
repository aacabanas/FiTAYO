<?php

namespace App\Http\Controllers;

use App\Models\user_milestones;
use App\Models\MilestoneAdvancementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MilestoneController extends Controller
{
    // Update milestone progress
    public function updateProgress(Request $request, $milestone_id)
    {
        $request->validate([
            'progress' => 'required|integer',
        ]);

        $milestone = user_milestones::findOrFail($milestone_id);
        $newProgress = $request->input('progress');

        // Assuming 'progress' can be either positive or negative to advance or reverse
        $milestone->currentProgress += $newProgress;

        if ($milestone->currentProgress < 0) {
            $milestone->currentProgress = 0;
        }

        $milestone->save();

        return response()->json(['message' => 'Milestone progress updated successfully', 'milestone' => $milestone]);
    }

    // Verify milestone advancement request
    public function verifyAdvancement(Request $request, $milestone_id)
    {
        $request->validate([
            'user_id' => 'required|integer',
        ]);

        $milestone = user_milestones::findOrFail($milestone_id);
        $user_id = $request->input('user_id');

        $advancementRequest = MilestoneAdvancementRequest::create([
            'milestone_id' => $milestone->id,
            'user_id' => $user_id,
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Milestone advancement request sent successfully', 'request' => $advancementRequest]);
    }

    // Confirm advancement (For coach/admin use)
    public function confirmAdvancement($request_id)
    {
        $advancementRequest = MilestoneAdvancementRequest::findOrFail($request_id);

        if ($advancementRequest->status != 'pending') {
            return response()->json(['message' => 'This request has already been processed'], 400);
        }

        $advancementRequest->status = 'confirmed';
        $advancementRequest->save();

        $milestone = $advancementRequest->milestone;
        $milestone->status = 'advanced';
        $milestone->save();

        return response()->json(['message' => 'Milestone advancement confirmed successfully', 'milestone' => $milestone]);
    }

    // Reject advancement (For coach/admin use)
    public function rejectAdvancement($request_id)
    {
        $advancementRequest = MilestoneAdvancementRequest::findOrFail($request_id);

        if ($advancementRequest->status != 'pending') {
            return response()->json(['message' => 'This request has already been processed'], 400);
        }

        $advancementRequest->status = 'rejected';
        $advancementRequest->save();

        return response()->json(['message' => 'Milestone advancement rejected successfully']);
    }
}
