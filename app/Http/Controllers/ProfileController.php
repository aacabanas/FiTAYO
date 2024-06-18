<?php

namespace App\Http\Controllers;

use App\Models\user_membership;
use App\Models\user_profile;
use App\Models\UserProfile;
use App\Models\UserMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $userProfile = user_profile::where('profile_ID', Auth::id())->first();

        if (!$userProfile) {
            return back()->withErrors(['message' => 'User profile not found.']);
        }

        return view('profile.edit', compact('userProfile', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'profile_image' => 'nullable|image|mimes:jpeg,png|max:2048',  // Size limit of 2048 KB (2 MB)
        ]);

        $userProfile = user_profile::where('profile_ID', Auth::id())->first();

        if (!$userProfile) {
            return back()->withErrors(['message' => 'User profile not found.']);
        }

        $userProfile->firstName = $request->firstName;
        $userProfile->lastName = $request->lastName;
        $userProfile->birthdate = $request->birthdate;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $userProfile->profile_image = $imageName;
        }

        $userProfile->save();

        $user->email = $request->email;
        $user->save();
        return back()->with('success', 'Profile updated successfully.');
    }

    public function showProfile()
    {
        $user = Auth::user();
        $userProfile = user_profile::where('profile_ID', Auth::id())->first();

        if (!$userProfile) {
            return back()->withErrors(['message' => 'User profile not found.']);
        }

        return view('dashboard.user', compact('userProfile', 'user'));
    }

    public function membership()
    {
        $userMembership = auth()->user()->userMembership;
        return view('profile.membership', ['userMembership' => $userMembership]);
    }

    public function changeSubscriptionPlan()
    {
        // Handle the logic for changing subscription plan
        return view('profile.change_subscription_plan');
    }

    public function policies()
    {
        return view('profile.policies');
    }
   





    public function index()
    {
        return view('profile.index'); // Make sure you have a profile.index view
    }

}