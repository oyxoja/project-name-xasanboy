<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Team;
use App\Models\Student;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index(){
        $courseCounts = Course::count();
        $teachers = Team::count();
        $students = Student::count();
        $comments = Testimonial::count();
        return view('admin.dashboard.index', compact('courseCounts', 'teachers', 'students', 'comments'));
    }
}
