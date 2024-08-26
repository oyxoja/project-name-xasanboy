@extends('admin.master')


@section('content')


              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Create a Comment </h4>
                  </div>
                  <div class="card-body">
                        <form action="{{route('admin.testimonial.store')}}" method="POST">
                          @csrf
                            <div class="form-group">
                              <label>Student's Full Name</label>
                              <input type="text" name="studentName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Class Name</label>
                              <input type="text" name="className"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Textarea</label>
                                <textarea name="comment" class="form-control"></textarea>
                            </div>
                        
                            <div class="form-group">
                              <label>Student's  Picture</label>
                              <input type="file" name="picture" class="form-control">
                            </div>
                            <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit">Add Comment</button>
                            </div>
                        </form>

                  </div>
                  
                </div>
              </div>





@endsection