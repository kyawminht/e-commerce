<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduct=Product::count();
        $totalCategory=Category::count();
        $totalBrand=Brand::count();

        $userTotal=User::count();
        $allUser=User::where('role_as','0')->count();
        $allAdmin=User::where('role_as','1')->count();

        $totalOrder=Order::count();
        $today=Carbon::now()->format('d-m-Y');
        $todayOrder=Order::where('created_at',$today)->count();
        $thisMonth=Carbon::now()->format('m');
        $thisMonthOrder=Order::where('created_at',$thisMonth)->count();
        $thisYear=Carbon::now()->format('Y');
        $thisYearOrder=Order::where('created_at',$thisYear)->count();

        return view('admin.dashboard',compact('totalProduct','totalCategory',
                                        'userTotal','allUser','allAdmin','todayOrder','totalOrder','thisMonthOrder',
                                        'thisYearOrder','totalBrand'));
    }
}
