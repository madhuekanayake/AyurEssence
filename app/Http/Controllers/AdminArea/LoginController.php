<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Index()
{
    try {
        // Fetch all gallery data


        return view('AdminArea.Pages.Authentication.login');
    } catch (\Exception $e) {
        // Handle any errors that occur
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}
public function Login(Request $request)
{
    // Validate input data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
        'role' => 'required|string|in:admin,super admin',
    ]);

    // Check user credentials
    $user = UserRole::where('email', $request->email)
                    ->where('role', $request->role)
                    ->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Start session for the user
        session([
            'user_id' => $user->id,
            'user_role' => $user->role,
            'user_name' => $user->name, // Store user's name in session
            'user_email' => $user->email, // Store user's email in session
        ]);

        // Redirect based on role
        if ($user->role === 'admin') {
            return view('AdminArea.Pages.Dashboard.index');
        } elseif ($user->role === 'super admin') {
            return redirect()->route('superadmin.dashboard');
        }
    } else {
        // If authentication fails, redirect back with an error
        return back()->withErrors(['error' => 'Invalid credentials or role']);
    }
}

public function Logout(Request $request)
{
    // Clear the session
    $request->session()->flush();

    // Redirect to login page
    return view('AdminArea.Pages.Authentication.login');
}

}
