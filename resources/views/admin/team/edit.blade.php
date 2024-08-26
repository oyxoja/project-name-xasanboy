@extends('admin.master')


@section('content')


              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Course</h4>
                  </div>
                  <div class="card-body">
                        <form action="{{route('admin.team.update', $team->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                            <div class="form-group">
                              <label>Teacher Name</label>
                              <input type="text" value='{{ $team->teacherName }}' name="teacherName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label></label>
                              <input type="text" value="{{ $team->subjectName }}" name="subjectName"  class="form-control">
                            </div>
                        
                            <div class="form-group">
                              <label>Teacher Picture</label>
                              <input type="file" name="picture" class="form-control">
                              <img src="{{ asset('temp/img/'.$team->picture) }}" alt="" width='200' height='150'>
                            </div>
                            <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit">Edit Team Member</button>
                            </div>
                        </form>

                  </div>
                  
                </div>
              </div>





@endsection