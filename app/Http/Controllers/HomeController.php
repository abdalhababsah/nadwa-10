<?php

namespace App\Http\Controllers;

use App\Models\Testemonial;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class HomeController extends Controller
{
    public function index()
    {
        $testemonials = Testemonial::latest()->where('is_accepted', true)->limit(6)->get();

        return view('home', compact('testemonials'));
    }
    /**
     * Store a new testimonial.
     *
     * This method handles the form submission from the home page.
     * It validates and saves the testimonial data, including the uploaded image if provided.
     */
    public function storeTestimonial(Request $request)
    {
        // Validate the request data
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'body' => 'required|string|max:5000',
            'image' => 'nullable|image|max:5096', // Optional image validation
        ]);
        // Logic to handle storing testimonials
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = Image::read($image)->scale(150, 150)->sharpen(); // apply sharpening if available
            $imageName = uniqid('testemonial_') . '.' . $image->getClientOriginalExtension();
            $img->save(storage_path('app/public/testemonial/' . $imageName));
            $validated['image'] = 'testemonial/' . $imageName;
        }

        // Create testemonial
        Testemonial::create($validated);
        // This method should handle the form submission from the home page

        return redirect('/#testimonial-form')->with(['success' => 'Thank you for your testimonial!']);
    }
}