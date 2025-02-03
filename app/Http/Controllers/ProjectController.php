<?php

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        try {
        $projects = Project::latest()->get();
        $categories = CategoryEnum::cases();

        return view('projects', compact('projects', 'categories'));
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function view($id)
    {
        $work = Project::findOrFail($id);

        return view('project_view', [
            'work' => $work,
        ]);
    }
}