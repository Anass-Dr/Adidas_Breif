<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        User::create($validatedData);

        $user = User::where('email', $validatedData['email'])->first();
        $request->session()->put('user_id', $user->id);
        $request->session()->put('user_role', $user->role->id);

        return redirect()->route('home')->with('status', 'Account successfully created');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_role', $user->role->id);
            return redirect()->route('home')->with('status', 'Login successful');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->forget('role_id');

        return redirect('/');
    }

    public function passwordReset(Request $request)
    {
        if ($request->route()->methods[0] === 'POST') {
            $emailAttribute = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
            $user = User::where('email', $emailAttribute)->first();

            if ($user) {
                # Generate token :
                $token = \App\Services\GenerateToken::new($user->email);
                $link = 'localhost:8000/password-reset/' . $token;

                # Send Email :
                Mail::to($user->email)->send(new ResetPasswordMail($link));
                return back()->with('status', 'Link sent. check your inbox');
            } else {
                return back()->with('status', 'Email not found');
            }
        };

        return view('auth.password_reset');
    }

    public function changePasswordPage(string $token)
    {
        $tokenStored = session('password_reset_token');
        $expired_time = session('password_token_expires_at');
        if ($tokenStored === $token && $expired_time >= now()) {
            return view('auth.new_password');
        } else {
            abort(401);
        }
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::where('email', session('password_reset_email'))->first();
        $user->update($validatedData);

        return redirect()->route('login')->with('status', 'Password changed successfully');
    }
}
