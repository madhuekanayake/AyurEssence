<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\AyurvedicHospital;
use App\Models\Customer;
use App\Models\Doctor;
use App\Models\LocalPharmacy;
use App\Models\Order;
use App\Models\SalePlants;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Index()
    {
        if (session()->has('user_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('AdminArea.Pages.Authentication.login');
    }




    public function Login(Request $request)
    {

      // Get total doctors
      $totalDoctors = Doctor::count();

      // Get total customers
      $totalCustomers = Customer::count();

      // Get total plants
      $totalPlants = SalePlants::count();

      // Get total sales (number of orders)
      $totalSales = Order::count();

      $totalhospitals = AyurvedicHospital::count();

      $totalpharmacy = LocalPharmacy::count();

      // Get total income (sum of all order amounts)
      $totalIncome = Order::where('payment_status', 'paid')->sum('total_amount');

      // Get latest 5 orders
      $latestOrders = Order::with('customer')->latest()->take(5)->get();

      // Get monthly sales data for chart
      $monthlySales = Order::select(
          DB::raw('MONTH(created_at) as month'),
          DB::raw('SUM(total_amount) as total')
      )
      ->where('created_at', '>=', now()->subMonths(6))
      ->where('payment_status', 'paid')
      ->groupBy('month')
      ->orderBy('month')
      ->get();

      // Format the data for the chart
      $salesChartData = [];
      $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

      foreach ($monthlySales as $sale) {
          $salesChartData[] = [
              'month' => $months[$sale->month - 1],
              'amount' => $sale->total
          ];
      }

      // Get top 5 products by sales
      $topProducts = DB::table('order_items')
          ->join('sale_plants', 'order_items.product_id', '=', 'sale_plants.id')
          ->select('sale_plants.plantname as product_name', DB::raw('SUM(order_items.quantity) as total_sales'))
          ->groupBy('sale_plants.plantname')
          ->orderByDesc('total_sales')
          ->take(5)
          ->get();



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
                return view('AdminArea.Pages.Dashboard.index', compact(
                    'totalDoctors',
                    'totalCustomers',
                    'totalPlants',
                    'totalSales',
                    'totalIncome',
                    'totalhospitals',
                    'totalpharmacy',
                    'latestOrders',
                    'salesChartData',
                    'topProducts'
                ));
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
