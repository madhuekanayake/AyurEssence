<?php

namespace App\Http\Controllers\ShopPlants;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        try {
            // Fetch all gallery data


            return view('ShopPlants.Pages.Authentication.login');


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function index2()
    {
        try {
            // Fetch all gallery data


            return view('ShopPlants.Pages.Authentication.register');


        } catch (\Exception $e) {
            // Handle any errors that occur
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6'
        ]);

        try {
            $data = $request->all();
            $data['customerId'] = 'CUST' . Str::random(6);
            $data['password'] = bcrypt($request->password); // Hash the password

            // Save customer data
            Customer::create($data);

            return back()->with('success', 'Customer registered successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $customer = Customer::where('email', $request->email)->first();

    if (!$customer || !password_verify($request->password, $customer->password)) {
        return back()->withErrors(['error' => 'Invalid email or password.']);
    }

    // Store customer data in session
    // session(['customer_email' => $customer->email]);
    session([
        'customer_email' => $customer->email,
        'customer_id' => $customer->id, // Save the customer ID in session
    ]);

    return redirect()->route('ShopPlants.index')->with('success', 'Logged in successfully!');
}

public function logout()
{
    Session::forget(['customer_id', 'customer_email']);
    return redirect()->route('auth.index')->with('success', 'Logged out successfully!');
}

public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();

        $customer = Customer::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

        if (!$customer) {
            $customer = Customer::create([
                'customerId' => 'CUST' . Str::random(6),
                'first_name' => explode(' ', $googleUser->name)[0] ?? '',
                'last_name' => explode(' ', $googleUser->name)[1] ?? '',
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'password' => bcrypt(Str::random(16)), // Random password
                'address_line1' => '',
                'address_line2' => null,
            ]);
        } else {
            // Update Google ID if needed
            $customer->update([
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
            ]);
        }

        // Store session
        session([
            'customer_email' => $customer->email,
            'customer_id' => $customer->id,
        ]);

        return redirect()->route('ShopPlants.index')->with('success', 'Logged in with Google successfully!');
    } catch (\Exception $e) {
        return redirect()->route('auth.index')->withErrors(['error' => 'Google login failed: ' . $e->getMessage()]);
    }
}

}
