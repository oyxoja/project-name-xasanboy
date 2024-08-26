@extends('admin.master')

@section('content')

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Count</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.count.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Count Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Count Number</label>
                                <input type="text" name="countNumber" class="form-control">
                            </div>

                            <div class="form-group">
                                <a href="{{route('admin.count.index')}}" class="btn btn-success">Go Back</a>
                                <input type="submit" class="btn btn-primary" value="Add Count">  
                            </div>
                        </form>
                        
                    </div>
                </div>
                
            </div>




@endsection