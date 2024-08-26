<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Str;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Student $student)
    {
        $request->validate([
            'studentName'=>'required',
            'studentEmail'=>'required',
            'course'=>'required'
            
        ]);

        // dd($request->all());

        $requestData = $request->all();

        $requestData['slug'] = Str::slug($request->studentName);

        $team = Student::create($requestData);
        
        return redirect()->route('index')->with('succes','Student added successfully !');
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
    public function edit(string $id)
    {
        return view('admin.students.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
