<?php

namespace App\Http\Controllers;

use App\Models\LatestWork;

class LatestWorkController extends Controller
{
    public function view($id)
    {
        $work = LatestWork::findOrFail($id);

        return view('latest_work_view', [
            'work' => $work,
        ]);
    }
}