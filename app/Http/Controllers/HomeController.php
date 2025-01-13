<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\LatestWork;
use App\Models\Testemonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        // Fetch services
        $services = Service::all();

        // Fetch latest works grouped by category
        $interiorWorks = LatestWork::where('category', 'interior')->orderBy('created_at', 'desc')->get();
        $exteriorWorks = LatestWork::where('category', 'exterior')->orderBy('created_at', 'desc')->get();

        $testemonials = Testemonial::latest()->limit(6)->get();

        return view('welcome', compact('services', 'interiorWorks', 'exteriorWorks', 'testemonials'));
    }
}