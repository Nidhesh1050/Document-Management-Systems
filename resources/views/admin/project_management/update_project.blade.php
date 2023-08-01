@extends('layouts.admin-app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title"> Update Project Manager</div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 col-lg-4">
                            <form action="{{url('admin/edit_project')}}" method="post" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" name="id" value="{{$users->id}}">


                                <div class="form-group">
                                    <label for="name">Project Name</label>
                                    <input type="text" class="form-control" name="project_name" value="{{$users->project_name}}"
                                        placeholder="name">
                                </div>


                                <div class="form-group">
                                    <label for="name">Project Manager</label>
                                    <select name="manager_d" class="form-control">
                                        <option value=""> Please Select</option>
                                    @foreach($project_manager as $parent)
                                    <option value="{{$users->id}}">{{$users->manager_d}}</option>
                                    @endforeach
                                </select>
                                </div>


                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="" class="form-control" value="{{$users->status}}" name="status"
                                        id="status" placeholder="Status">
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection