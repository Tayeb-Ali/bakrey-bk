<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bakery;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeAPIController extends Controller
{
    public function home_bakery($userId)
    {
        $bakery = Order::where('user_id', $userId)
            ->where('status', 4)
            ->orderByDesc('id')
            ->limit(4)->get();

//        if ($bakery->count()) {
        $bakeryInfo = Bakery::where('user_id', $userId)->first();
        return response()->json(['data' => $bakery, 'bakeryInfo' => $bakeryInfo, 'message' => 'Successful get bakery data', 'status' => true]);
//        }
//        return response()->json(['data' => null, 'message' => 'Fail to get bakery data', 'status' => false]);
    }

    public function home_agent($userId)
    {
        $agent = Bakery::where('agency_id', $userId)->limit(10)->get();
        if ($agent->count()) {
            return response()->json(['data' => $agent, 'message' => 'Successful get agency data', 'status' => true]);
        }
        return response()->json(['data' => null, 'message' => 'Fail to get agency data', 'status' => false]);

    }
}
