<?php

namespace App\Http\Controllers;
use App\Models\Testemonial;

class HomeController extends Controller
{
    
    public function index()
    {
        $testemonials = Testemonial::latest()->limit(6)->get();

        return view('welcome', compact('testemonials'));
    }
}