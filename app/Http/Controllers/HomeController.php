<?php


namespace App\Http\Controllers;


use App\Models\Bakery;
use App\Models\Driver;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
//        $orders = Order::all('id')->count();
        $orders = Order::where('status', 4)->count();
        $agent = User::where('role', 2)->count();
//        $bakery = User::where('role', 3)->count();
        $bakery = Bakery::all()->count();
        $driver = Driver::all('id')->count();
//        return $data = ['order' => $orders, 'agent' => $agent, 'bakery' => $bakery, 'driver' => $driver];
        return view('home', compact('bakery', 'orders', 'driver', 'agent'));
    }
}
