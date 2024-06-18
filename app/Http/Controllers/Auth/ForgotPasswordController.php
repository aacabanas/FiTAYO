<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->input('email');
        $user = \App\Models\User::where('email', $email)->first();

        if ($user) {
            $token = Str::random(60);

            \DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now(),
            ]);

            $resetLink = route('password.reset', ['token' => $token, 'email' => $email]);

            Mail::send('emails.password_reset', ['resetLink' => $resetLink], function ($message) use ($email) {
                $message->to($email)
                    ->subject('Password Reset Request');
            });
        }

        return back()->with(['status' => 'A password reset link has been sent.']);
    }
}
