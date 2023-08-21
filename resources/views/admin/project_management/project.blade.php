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
                    <a href="{{url('admin/project_management')}}">Add Project</a>
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
                        <div class="card-title">Add Project</div>
                    </div>
                    <div class="card-body">
                    <form action="{{url('admin/add_project')}}" method="post" id="category"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input type="text" class="form-control" name="project_name" id="" placeholder="name">
                            <span class="text-danger error ">
                                @error('project_name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                        <label>Manager Name</label>
                        <select name="manager_d" class="form-control">
                        <option value=""> Please Select</option>
                        @foreach($project_manager as $project_manager)
                            <option value="{{$project_manager->id}}"> <?php echo $project_manager->name;?></option>
                            @endforeach
                        </select>
                        <span class="text-danger error ">
                                @error('manager_d')
                                {{$message}}
                                @enderror
                        </span>
                    </div>
                    <div class="form-group col-md-12">
                                        <label for="description"> Project Description</label>
                                        <textarea class="form-control" name="description" id="editor" placeholder="write text" rows="2">
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
                            <input type="checkbox" name="status" id="status">
                                <span class="text-danger error ">
                                @error('status')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('admin/view_project')}}" class="mt-4 btn btn-danger">Cancel</a>
                            <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $("#category").validate({
        rules: {
            project_name: "required",
            manager_d: "required",
            status: "required",

        },
        messages: {
            project_name: "Please enter your Project Name",
            manager_d: "Please select manager_d",
            status: "Please select Status",
        }
    });
});
</script>
<script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
