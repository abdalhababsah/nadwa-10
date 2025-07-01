<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testemonial;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Event\Code\Test;

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

    public function accept(Testemonial $testemonial)
    {
        $testemonial->is_accepted = true;
        $testemonial->accepted_at = now();
        $testemonial->save();

        return redirect('admin/testemonials')->with(['success' => 'Testimonial accepted successfully']);
    }

    public function decline(Testemonial $testemonial)
    {
        $testemonial->is_accepted = false;
        $testemonial->accepted_at = now();
        $testemonial->save();

        return redirect('admin/testemonials')->with(['success' => 'Testimonial declined successfully']);
    }
}
