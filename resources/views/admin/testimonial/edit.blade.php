@extends('admin.master')


@section('content')


              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Comment</h4>
                  </div>
                  <div class="card-body">
                        <form action="{{route('admin.testimonial.update', $testimonial->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                            <div class="form-group">
                              <label>Student Name</label>
                              <input type="text" value='{{ $testimonial->studentName }}' name="studentName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Class Name</label>
                              <input type="text" value="{{ $testimonial->className }}" name="className"  class="form-control">
                            </div>

                            <div class="form-group">
                              <label></label>
                              <textarea name="comment" class='form-control'>{{ $testimonial->comment }}</textarea>
                            </div>
                        
                            <div class="form-group">
                              <label>Teacher Picture</label>
                              <input type="file" name="picture" class="form-control">
                              <img src="{{ asset('temp/img/'.$testimonial->picture) }}" alt="" width='200' height='150'>
                            </div>
                            <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit">Edit Comment</button>
                            </div>
                        </form>

                  </div>
                  
                </div>
              </div>





@endsection