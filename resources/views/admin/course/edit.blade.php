@extends('admin.master')


@section('content')


              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Course</h4>
                  </div>
                  <div class="card-body">
                        <form action="{{route('admin.course.update', $course->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                            <div class="form-group">
                              <label>Course Name</label>
                              <input type="text" value='{{ $course->courseName }}' name="courseName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Teacher Name</label>
                              <input type="text" value="{{ $course->teacherName }}" name="teacherName"  class="form-control">
                            </div>
                        
                            <div class="form-group">
                              <label>Course Picture</label>
                              <input type="file" name="picture" class="form-control">
                              <img src="{{ asset('temp/img/'.$course->picture) }}" alt="" width='200' height='150'>
                            </div>

                            <div class="form-group">
                              <label>More Info</label>
                              <textarea type='text' name="body" id="" class="form-control" cols="30" rows="10"> {{ $course->body }}</textarea>
                            </div>
                            <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit">Edit Course</button>
                            </div>
                        </form>

                  </div>
                  
                </div>
              </div>





@endsection