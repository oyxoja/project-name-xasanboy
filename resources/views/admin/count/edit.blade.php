@extends('admin.master')

@section('content')

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Count</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.count.update',$count->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Count Name</label>
                                <input type="text" value="{{ $count->name }}" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Count Number</label>
                                <input type="text" value="{{$count->countNumber}}" name="countNumber" class="form-control">
                            </div>

                            <div class="form-group">
                                <a href="{{route('admin.count.index')}}" class="btn btn-success">Go Back</a>
                                <input type="submit" class="btn btn-warning" value="Edit Count">  
                            </div>
                        </form>
                        
                    </div>
                </div>
                
            </div>




@endsection