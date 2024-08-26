@extends('admin.master')

@section('content')


            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Team Members</h4>
                    <a href="{{ route('admin.team.create') }}" class="btn btn-success">Add Member</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        @if(Session::has('success'))

                            <p class='alert alert-success text-white'>{{ Session::get('success') }}</p>

                        @endif
                        @if(Session::has('delete'))

                            <p class='alert alert-danger text-white'>{{ Session::get('delete') }}</p>

                        @endif
                      <table class="table table-bordered table-md">
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Name</th>
                          <th class="text-center">Subject</th>
                          <th class="text-center">Slug</th>
                          <th class="text-center">Picture</th>
                          <th class="text-center" colspan="3">Action</th>
                        </tr>
                        @foreach($teams as $team)
                        <tr>
                          <td class="text-center">{{ $team->id }}</td>
                          <td class="text-center">{{$team->teacherName}}</td>
                          <td class="text-center">{{$team->subjectName}}</td>
                          <td class="text-center">{{ $team->slug }}</td>
                          
                          <td class="text-center">
                            <img src="{{ asset('temp/img/'.$team->picture) }}" alt="" width='200' height='150'>
                          </td>
                          <td class="text-center">
                            <a href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                          </td>
                          <td class="text-center">
                            <form action="#" method="POST">
                              @csrf
                              @method('DELETE')
                              <input type="submit" onclick = "return confirm('Delete info?')" value="Delete" class="btn btn-danger">
                            </form>
                          </td>
                          <td class="text-center">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </td>
                         
                        </tr>
                      @endforeach
                  
                        
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span
                              class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>


@endsection