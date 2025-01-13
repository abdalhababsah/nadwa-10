<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LatestWorkImage;
use Illuminate\Http\Request;

use App\Models\LatestWork;
use Illuminate\Support\Facades\Storage;
use Str;

class LatestWorkController extends Controller
{
    /**
     * Display a listing of the latest works.
     */
    public function index()
    {
        // Fetch latest works ordered by the newest first
        $latestWorks = LatestWork::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.latestWork.index', compact('latestWorks'));
    }

    /**
     * Show the form for creating a new latest work.
     */
    public function create()
    {
        return view('admin.latestWork.create');
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
            $path = $image->storeAs('latest_works', $filename, 'public');
            $imagesInst[] = [
                'latest_work_id' => $id,
                'image' => $path
            ];
        }
        LatestWorkImage::insert($imagesInst);
    }
    /**
     * Store a newly created latest work in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'category' => 'required|in:interior,exterior',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image',
            'images.*' => 'image',
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('latest_works', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Create latest work
        $latestWork = LatestWork::create($validated);

        if ($request->hasFile('images')) {
            $this->handleAdditionalImageUpload($request->file('images'), $latestWork->id);
        }

        return response()->json(['success' => 'Latest work created successfully.']);
    }

    /**
     * Show the form for editing the specified latest work.
     */
    public function edit($id)
    {
        $work = LatestWork::findOrFail($id);
        return view('admin.latestWork.edit', compact('work'));
    }

    /**
     * Update the specified latest work in storage.
     */

    public function update(Request $request, $id)
    {
        // Find the latest work by ID or fail
        $latestWork = LatestWork::findOrFail($id);

        // Validate incoming data
        $data = $request->validate([
            'category' => 'required|in:interior,exterior',
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
            if ($latestWork->image_path && Storage::disk('public')->exists($latestWork->image_path)) {
                Storage::disk('public')->delete($latestWork->image_path);
            }

            // Store the new image and update the path
            $imagePath = $request->file('image_path')->store('latest_works', 'public');
            $data['image_path'] = $imagePath;
        }

        // Update the latest work with validated data
        $latestWork->update($data);

        $latestWorkImagesId = $latestWork->images->pluck('id')->toArray();
        if (isset($data['images_id'])) {
            $deletedImageId = array_diff($latestWorkImagesId, $data['images_id']);
            LatestWorkImage::destroy($deletedImageId);
        } else {
            LatestWorkImage::destroy($latestWorkImagesId);
        }

        if ($request->hasFile('images')) {
            $this->handleAdditionalImageUpload($request->file('images'), $latestWork->id);
        }
        // Redirect back with a success message
        return response()->json(['success' => 'Latest work updated successfully.']);
    }

    /**
     * Remove the specified latest work from storage.
     */
    public function destroy($id)
    {
        $latestWork = LatestWork::find($id);

        // Delete the image if it exists
        if ($latestWork->image_path) {
            Storage::disk('public')->delete($latestWork->image_path);
        }


        foreach ($latestWork->images as $image) {
            $image->delete();
        } // Trigger the `deleting` event on the model 

        // Delete the latest work
        $latestWork->delete();

        return redirect('admin/latest-works')->with('success', 'Latest work deleted successfully.');
    }
}
