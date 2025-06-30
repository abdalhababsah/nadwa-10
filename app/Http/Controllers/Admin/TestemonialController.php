<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testemonial;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TestemonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testemonials = Testemonial::latest()->paginate(10);
        
        return view('admin.testemonial.index',[
            'testemonials' => $testemonials ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testemonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image',
        ]);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = Image::read($image)->scale(150, 150)->sharpen(); // apply sharpening if available
            $imageName = uniqid('testemonial_') . '.' . $image->getClientOriginalExtension();
            $img->save(storage_path('app/public/testemonial/' . $imageName));
            $validated['image'] = 'testemonial/' . $imageName;
        }

        // Create testemonial
        $testemonial = Testemonial::create($validated);

        return redirect('admin/testemonials')->with(['success' => 'testemonial created successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testemonial = Testemonial::findOrFail($id);

        return view('admin.testemonial.edit',[
            'testemonial' => $testemonial ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testemonial = Testemonial::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image',
        ]);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            Storage::disk('public')->delete($testemonial->image);

            // Resize and save new image
            $image = $request->file('image');
            $img = Image::read($image)->scaleDown(150, 150)->sharpen(10); //more sharpening it'll look like drawing
            $imageName = uniqid('testemonial_') . '.' . $image->getClientOriginalExtension();
            $img->save(storage_path('app/public/testemonial/' . $imageName));
            $validated['image'] = 'testemonial/' . $imageName;
        }

        // update testemonial
        $testemonial->update($validated);

        return redirect('admin/testemonials')->with(['success' => 'testemonial created successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Testemonial::destroy($id);

        return redirect('admin/testemonials')->with(['success' => 'testemonial deleted successfully']);
    }
}
