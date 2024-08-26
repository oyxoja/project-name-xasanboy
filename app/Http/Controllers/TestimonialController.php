<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Testimonial::all();
        return view('admin.testimonial.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'comment' => 'required',
            'studentName' => 'required',
            'picture' => 'required',
            'className' => 'required',
        ]);
    
        // dd($request->all());
    
        $requestData = $request->all();
    
        if ($request->hasFile('picture')){
            $file = $request->file('picture');  
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('temp/img/'), $image_name);
            $requestData['image'] = $image_name;
        }
    
        $testimonial = Testimonial::create($requestData);
    
        return redirect()->route('admin.testimonial.index')->with('success', 'Comment added successfully!');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $requestData = $request->all();
    
        if($request->hasFile('picture')) {
    

        if($testimonial->picture && file_exists(public_path('temp/img/'.$testimonial->picture))) {
                unlink(public_path('temp/img/'.$testimonial->picture));
        } 
            $file = $request->file('picture');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('temp/img/'), $image_name);
            $requestData['picture'] = $image_name;
        }
        $testimonial->update($requestData); 
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
