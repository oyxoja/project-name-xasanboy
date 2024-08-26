@extends('admin.master')


@section('content')


              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Team Member</h4>
                  </div>
                  <div class="card-body">
                        <form action="{{route('admin.team.store')}}" method="POST">
                          @csrf
                            <div class="form-group">
                              <label>Teacher Full Name</label>
                              <input type="text" name="teacherName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Subject Name</label>
                              <input type="text" name="subjectName"  class="form-control">
                            </div>
                        
                            <div class="form-group">
                              <label>Teacher Picture</label>
                              <input type="file" name="picture" class="form-control">
                            </div>
                            <div class="card-footer text-right">
                              <button class="btn btn-primary mr-1" type="submit">Add Member</button>
                            </div>
                        </form>

                  </div>
                  
                </div>
              </div>





@endsection