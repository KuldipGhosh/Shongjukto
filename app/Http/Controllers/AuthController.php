<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
{
    try {
        // Validate input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:beneficiary,volunteer',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Optional: store user in session
        session(['user_id' => $user->id,
        'role' => $user->role,]);

        return redirect('/')->with('success', 'Registered successfully');

    } catch (\Exception $e) {
        // Log the actual error for debugging
        Log::error('Registration Error: ' . $e->getMessage());

        // Return back with an error message
        return back()->withErrors(['error' => 'Registration failed. Please try again.']);
    }
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'User not found']);
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors(['password' => 'Incorrect password']);
    }

    // Store user ID and role in session
    session(['user_id' => $user->id, 'role' => $user->role]);


    // Redirect based on role
    if ($user->role === 'beneficiary') {
        return redirect('/request-help');
    } elseif ($user->role === 'volunteer') {
        return redirect('/volunteer/requests');
    }

    // fallback
    return redirect('/dashboard')->with('success', 'Logged in successfully');
}
}
