<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {  
        $projects = Project::count(); // Fetch count of project
        return view('admin.dashboard', compact('projects'));
    }
    
}
