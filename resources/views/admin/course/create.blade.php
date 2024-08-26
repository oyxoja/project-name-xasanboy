@extends('admin.master')


@section('content')


              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Course</h4>
                  </div>
                  <div class="card-body">
                        <form action="{{route('admin.course.store')}}" method="POST">
                          @csrf
                            <div class="form-group">
                              <label>Course Name</label>
                              <input type="text" name="courseName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Teacher Name</label>
                              <input type="text" name="teacherName"  class="form-control">
                            </div>
                        
                            <div class="form-group">
                              <label>Course Picture</label>
                              <input type="file" name="picture" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Detail</label>
                              <textarea type='text' name="body" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit">Add Course</button>
                            </div>
                        </form>

                  </div>
                  
                </div>
              </div>





@endsection