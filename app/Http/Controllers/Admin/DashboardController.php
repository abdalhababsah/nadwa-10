<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LatestWork;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {  
        $latestwork = LatestWork::count(); // Fetch count of latest work
        $services = Service::count();  
        // dd($services);   // Fetch count of services
        return view('admin.dashboard', compact('latestwork', 'services'));
    }
    
}
