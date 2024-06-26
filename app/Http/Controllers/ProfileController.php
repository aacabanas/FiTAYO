<?php

namespace App\Http\Controllers;

use App\Models\user_profile;
use App\Models\user_membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $userProfile = $user->user_profile;

        if (!$userProfile) {
            return back()->withErrors(['message' => 'User profile not found.']);
        }

        return view('dashboard.user', compact('userProfile', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'profile_image' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        $userProfile = $user->user_profile;

        if (!$userProfile) {
            return back()->withErrors(['message' => 'User profile not found.']);
        }

        $userProfile->firstName = $request->firstName;
        $userProfile->lastName = $request->lastName;
        $userProfile->birthdate = $request->birthdate;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
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
        $userProfile = $user->user_profile;
        $userMembership = $user->user_membership;

        if (!$userProfile || !$userMembership) {
            return back()->withErrors(['message' => 'User profile or membership not found.']);
        }
        // Debugging: Check if userMembership data is being fetched correctly
        // Uncomment this line to debug
        // dd($userMembership);

        return view('dashboard.user', compact('userProfile', 'user', 'userMembership'));
    }

    public function membership()
    {
        $user = Auth::user();
        $userMembership = $user->user_membership;

        if (!$userMembership) {
            return back()->withErrors(['message' => 'Membership not found.']);
        }

        return view('dashboard.user', compact('userMembership', 'user'));
    }

    public function changeSubscriptionPlan()
    {
        return view('dashboard.user');
    }

    public function policies()
    {
        return view('dashboard.user');
    }

    public function index()
    {
        $user = Auth::user();
        $userProfile = $user->user_profile;
        $userMembership = $user->user_membership;

        return view('dashboard.user', compact('userProfile', 'user', 'userMembership'));
    }
}