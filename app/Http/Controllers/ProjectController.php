<?php

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\Project;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Laravel\Facades\Image;

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
    
    /**
     * Show the resized cover for the projects blade.
     */
    public function showResizedCover(string $filename) 
    {
        $thumbPath = public_path("storage/resized-projects/{$filename}");

        // Early return if thumbnail already exists
        if (file_exists($thumbPath)) {
            return response()->file($thumbPath);
        }

        $maxWidth = 520;
        $originalPath = public_path("storage/projects/{$filename}");

        if (file_exists($originalPath)) {
            // Resize the image to fit within maxWidth and maxHeight
            $img = Image::read($originalPath)
            ->scaleDown(height: 550)->crop(width: $maxWidth, height: 450, position: 'center');

            // Ensure the directory exists
            if (!file_exists(dirname($thumbPath))) {
            mkdir(dirname($thumbPath), 0755, true);
            }

            $img->save($thumbPath);

            return response()->file($thumbPath);
        }

        // If the original file does not exist, return a 404 response
        // If we have adefault image in future, we can return that instead
        abort(404, 'File not found.');
    }

}