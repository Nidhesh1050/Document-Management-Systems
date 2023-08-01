@extends('layouts.admin-app')

@section('content')
    
<div class="content">
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <form action="{{url('admin/update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $users->id }}">
                        <div class="form-group">
                            <h1>Update Document Name</h1>
                            <label for="name">Name</label>
                            <input type="name" class="form-control"
                                placeholder="Enter Name" name="name" value="{{ $users->name }}">
                              
                        </div>
                        
                        <button type="update" class="btn btn-primary">Update</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
        
</div>

@endsection

