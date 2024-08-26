<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Count;
use App\Models\Course;
use App\Models\Team;
use App\Models\Testimonial;
use Mail;
use App\Mail\MyEmail;

class MainController extends Controller
{
    public function index(){
        $counts= Count::all();
        $courses= Course::all();
        $teams= Team::all();
        $comments = Testimonial::all();
        return view('index', compact('counts', 'courses', 'teams', 'comments'));
    }

    public function about(){
        $counts= Count::all();
        return view('sections.about', compact('counts'));
    }

    public function courses(){
        $courses = Course::all();
        return view('sections.courses', compact('courses'));
    }

    public function contact(){
        return view('sections.contact');
    }


    public function detail($id){
        $courses = Course::findOrFail($id);
        return view('sections.detail', compact('courses'));
    }



    public function feature(){
        return view('sections.feature');
    }

    public function team(){
        $teams = Team::all();
        return view('sections.team', compact('teams'));
    }

    public function testimonial(){
        $comments = Testimonial::all();
        return view('sections.testimonial', compact('comments') );
    }

    public function sendMessage(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
            'file'=>'required|mimes:jpg,png,doc'

        ]);

        // dd($request->all());


        $data = $request->all();

        if($request->hasFile('file')){
            $file= $request->file('file');
            $fileName = $file->getClientOriginalName();

            $file->move('files/', $fileName);

            $data['file'] = 'files/'.$fileName;
        }

        Mail::to('oyxojaaa@gmail.com')->send(new MyEmail($data,$fileName));

        return redirect()->back()->with(['send'=>'Message sent!']);

    }

}
