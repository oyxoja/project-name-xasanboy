<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=Course::all();
        $courseCount = Course::count();
        return view('admin.course.index', compact('courses', 'courseCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'courseName'=>'required',
            'teacherName'=>'required',
            'picture'=>'required',
            'body'=>'required'
        ]);

        // dd($request->all());

        $requestData = $request->all();

        if($request->hasFile('picture')){
            $file=$request->file('picture');

            $image_name = rand();

            $file->move('temp/img',$image_name);

            $requestData['picture'] = $image_name;
        }

        $requestData['slug'] = Str::slug($request->courseName);

        $course = Course::create($requestData);
        
        return redirect()->route('admin.course.index')->with('succes','Course added successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $course = Course::findOrFail($id);


        $lastestCourses = Course::orderBy('created_at', 'desc')->take(4)->get();


        return view('sections.detail', compact('course', 'lastestCourses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $requestData = $request->all();
    
        if($request->hasFile('picture')){
    
            if($course->picture){
                unlink(public_path('temp/img/'.$course->picture));
            }
    
            $file = $request->file('picture');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('temp/img/'), $image_name);
            $requestData['picture'] = $image_name;
        }
    
        $requestData['slug'] = \Illuminate\Support\Str::slug($requestData['courseName']);
    
        $course->update($requestData);
    
        return redirect()->route('admin.course.index')->with('success','Course updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
