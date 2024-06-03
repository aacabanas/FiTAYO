<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\UserMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $userProfile = UserProfile::where('user_ID', $user->id)->first();

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
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        $userProfile = UserProfile::where('user_ID', $user->id)->first();

        if (!$userProfile) {
            return back()->withErrors(['message' => 'User profile not found.']);
        }

        $userProfile->firstName = $request->firstName;
        $userProfile->lastName = $request->lastName;
        $userProfile->birthdate = $request->birthdate;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageSize = $image->getSize();

            if ($imageSize > 2048 * 1024) {
                $image = Image::make($image)->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('jpg', 75);
            }

            if ($userProfile->profile_image && $userProfile->profile_image !== 'blankprofile.png') {
                @unlink(public_path('images/' . $userProfile->profile_image));
            }

            $imageName = uniqid() . '.jpg';
            $imagePath = public_path('images/' . $imageName);
            Image::make($image)->save($imagePath);

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
        $userProfile = UserProfile::where('user_ID', $user->id)->first();

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

}
