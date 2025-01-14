<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testemonial;
use Illuminate\Http\Request;
use Storage;

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
            $imagePath = $request->file('image')->store('testemonial', 'public');
            $validated['image'] = $imagePath;
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
            $imagePath = $request->file('image')->store('testemonial', 'public');
            Storage::disk('public')->delete($testemonial->image);
            $validated['image'] = $imagePath;
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
