<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        try {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);

        return view('services', compact('services'));
        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
