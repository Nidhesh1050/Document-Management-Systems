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
                    <div class="card-header">
                   <div class="flash-message">
                        @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @endif  
                        @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @endif  
                        </div>
                        <div class="card-title">Edit Project</div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/edit_project')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" value="{{$projects->id}}">


                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control" name="project_name"
                                    value="{{$projects->project_name}}" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Project Manager</label>
                                <select name="manager_d" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($managers as $manager){?>
                                        <option <?php if($manager->id == $projects->manager_d){?>selected <?php } ?> value="{{$manager->id}}">{{$manager->name}}</option>
                                        <?php }?>
                                    </select>


                                
                            </div>
                            <div class="form-group col-md-12">
                                        <label for="description"> Project Description</label>
                                        <textarea class="form-control" name="description" id="editor" placeholder="write text" rows="2">
                                        {{$projects->description}}
                                            </textarea>
                                        <span class="text-danger error ">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                              </div>
                                <div class="form-group">
                        <label for="status">Status</label>
                           &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="status" id="status"  {{$projects->status==1 ? 'checked': '' }} >
                                <span class="text-danger error ">
                                @error('status')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="{{url('admin/view_project')}}" class="mt-4 btn btn-danger">Cancel</a>
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
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection