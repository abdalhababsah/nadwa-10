<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public'); // Save in `storage/app/public/services`
            $data['image_path'] = $imagePath;
        }
    
        Service::create($data);
    
        return redirect()->route('admin.services.index')->with('success', 'Service added successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
    
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($service->image_path && Storage::disk('public')->exists($service->image_path)) {
                Storage::disk('public')->delete($service->image_path);
            }
    
            $imagePath = $request->file('image')->store('services', 'public');
            $data['image_path'] = $imagePath;
        }
    
        $service->update($data);
    
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
