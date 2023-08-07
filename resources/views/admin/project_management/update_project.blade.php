@extends('layouts.admin-app')

@section('content')

<div class="content">

    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('admin/home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/view_project')}}">Project Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Project</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Project</div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/edit_project')}}" method="post" id="category_update" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" value="{{$users->id}}">


                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control" name="project_name"
                                    value="{{$users->project_name}}" placeholder="name">

                            </div>


                            <div class="form-group">
                                <label for="name">Project Manager</label>

                                <select name="manager_d" class="form-control">
                                    @foreach($project_manager as $parent)
                                    <option value=""> Please Select</option>
                                    <option value="{{$users->id}}">{{$users->manager_d}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $("#category_update").validate({
            rules: {
                project_name: "required",
                manager_d: "required",

            },
            messages: {
                project_name: "*Update your project name",
                manager_d: "*Update your manager id",
            }
        });
    });
@endsection
