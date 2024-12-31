<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LatestWork;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.latest-works.create');
    }

    /**
     * Store a newly created latest work in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'category'    => 'required|in:interior,exterior',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image', 
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('latest_works', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Create latest work
        LatestWork::create($validated);

        return redirect()->route('admin.latest-works.index')->with('success', 'Latest work created successfully.');
    }

    /**
     * Show the form for editing the specified latest work.
     */
    public function edit(LatestWork $latestWork)
    {
        return view('admin.latest-works.edit', compact('latestWork'));
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
             'category'    => 'required|in:interior,exterior',
             'title'       => 'required|string|max:255',
             'description' => 'required|string',
             'image'       => 'nullable|image', // Max 2MB
         ]);
     
         // Handle image upload
         if ($request->hasFile('image')) {
             // Delete the old image if it exists in storage
             if ($latestWork->image_path && Storage::disk('public')->exists($latestWork->image_path)) {
                 Storage::disk('public')->delete($latestWork->image_path);
             }
     
             // Store the new image and update the path
             $imagePath = $request->file('image')->store('latest_works', 'public');
             $data['image_path'] = $imagePath;
         }
     
         // Update the latest work with validated data
         $latestWork->update($data);
     
         // Redirect back with a success message
         return redirect()->route('admin.latest-works.index')->with('success', 'Latest work updated successfully.');
     }

    /**
     * Remove the specified latest work from storage.
     */
    public function destroy(LatestWork $latestWork)
    {
        // Delete the image if it exists
        if ($latestWork->image_path) {
            Storage::disk('public')->delete($latestWork->image_path);
        }

        // Delete the latest work
        $latestWork->delete();

        return redirect()->route('admin.latest-works.index')->with('success', 'Latest work deleted successfully.');
    }
}
