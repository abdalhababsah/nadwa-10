<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryEnum;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the Projects.
     */
    public function index()
    {
        $categories = CategoryEnum::cases();
        // Fetch Projects ordered by the newest first
        $query = Project::orderBy('order')->latest('created_at');

        if (request()->has('category') && in_array(request('category'), array_column($categories, 'value'))) {
            $query->where('category', request('category'));
        }

        $projects = $query->paginate(10)->withQueryString();

        return view('admin.projects.index', compact('projects', 'categories'));
    }

    /**
     * Show the form for creating a new Project.
     */
    public function create()
    {
        $categories = CategoryEnum::cases();

        return view('admin.projects.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Handle the upload of an additional image.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     */
    protected function handleAdditionalImageUpload($images, $id)
    {
        $imagesInst = [];
        foreach ($images as $image) {
            $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('projects', $filename, 'public');
            $imagesInst[] = [
                'project_id' => $id,
                'image' => $path
            ];
        }
        ProjectImage::insert($imagesInst);
    }
    /**
     * Store a newly created Project in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'category' => ['required', Rule::in(CategoryEnum::cases())],
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image',
            'images.*' => 'image',
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('projects', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Create Project
        $project = Project::create($validated);

        if ($request->hasFile('images')) {
            $this->handleAdditionalImageUpload($request->file('images'), $project->id);
        }

        return response()->json(['success' => 'Project created successfully.']);
    }

    /**
     * Show the form for editing the specified Project.
     */
    public function edit($id)
    {
        $categories = CategoryEnum::cases();
        $work = Project::findOrFail($id);
        
        return view('admin.projects.edit', compact('work', 'categories'));
    }

    /**
     * Update the specified Project in storage.
     */

    public function update(Request $request, $id)
    {
        // Find the Project by ID or fail
        $project = Project::findOrFail($id);

        // Validate incoming data
        $data = $request->validate([
            'category' => ['required', Rule::in(CategoryEnum::cases())],
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image',
            'images.*' => 'nullable|image',
            'images_id' => 'nullable',
            'images_id.*' => 'integer',
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            // Delete the old image if it exists in storage
            if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
                Storage::disk('public')->delete($project->image_path);
            }

            // Store the new image and update the path
            $imagePath = $request->file('image_path')->store('projects', 'public');
            $data['image_path'] = $imagePath;
        }

        // Update the Project with validated data
        $project->update($data);

        $ProjectImagesId = $project->images->pluck('id')->toArray();
        if (isset($data['images_id'])) {
            $deletedImageId = array_diff($ProjectImagesId, $data['images_id']);
            ProjectImage::destroy($deletedImageId);
        } else {
            ProjectImage::destroy($ProjectImagesId);
        }

        if ($request->hasFile('images')) {
            $this->handleAdditionalImageUpload($request->file('images'), $project->id);
        }
        // Redirect back with a success message
        return response()->json(['success' => 'Project updated successfully.']);
    }

    /**
     * Update the order of Projects.
     */
    public function updateOrder(Request $request)
    {
        // return response()->json(['success' => 'Method not implemented.'], 200);
        $validated = $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'integer|exists:projects,id',
            'orders.*.order' => 'integer|min:0',
        ]);

        // Update the order of each Project
        foreach ($validated['orders'] as $order) {
            Project::where('id', $order['id'])->update(['order' => $order['order']]);
        }

        return response()->json(['success' => 'Project order updated successfully.']);
    }
    /**
     * Remove the specified Project from storage.
     */
    public function destroy($id)
    {
        $Project = Project::find($id);

        // Delete the image if it exists
        if ($Project->image_path) {
            Storage::disk('public')->delete($Project->image_path);
        }


        foreach ($Project->images as $image) {
            $image->delete();
        } // Trigger the `deleting` event on the model 

        // Delete the Project
        $Project->delete();

        return redirect('admin/projects')->with('success', 'Project deleted successfully.');
    }
}
