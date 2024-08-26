@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <!-- Courses Section -->
        <div class="col-md-3 mr-3 p-4 card bg-primary text-white">
            <h2>All Courses</h2>
            <table class="table table-striped">
                <thead>
                    <tr >
                        <h1 class="text-white">{{ $courseCounts }}</h1>
                    </tr>
                    <h5>
                        <a href="{{ route('admin.course.index') }}" class="text-white fs-3">View</a>
                    </h5>
                    
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>

        <!-- Teachers Section -->
        <div class="col-md-3 p-4 card bg-success text-white">
            <h2>All Teachers</h2>
            <table class="table table-striped">
                <thead>
                    <tr >
                        <h1 class="text-white">{{ $teachers }}</h1>
                    </tr>
                    <h5>
                        <a href="{{ route('admin.team.index') }}" class="text-white fs-3">View</a>
                    </h5>
                    
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Students Section -->
        <div class="col-md-3 mr-3 p-4 card bg-danger text-white">
            <h2>All Students</h2>
            <table class="table table-striped">
                <thead>
                    <tr >
                        <h1 class="text-white">{{ $students }}</h1>
                    </tr>
                    <h5>
                        <a href="{{ route('admin.students.index') }}" class="text-white fs-3">View</a>
                    </h5>
                    
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>

        <!-- Comments Section -->
        <div class="col-md-3 p-4 card bg-warning text-white">
            <h2>All Comments</h2>
            <table class="table table-striped">
                <thead>
                    <tr >
                        <h1 class="text-white">{{ $comments }}</h1>
                    </tr>
                    <h5>
                        <a href="{{ route('admin.testimonial.index') }}" class="text-white fs-3">View</a>
                    </h5>
                    
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div> 
    </div>
</div>
@endsection
