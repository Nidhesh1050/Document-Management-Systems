@extends('layouts.admin-app')

@section('content')

<div class="content">
    <div class="card">
        <div class="card-title p-3">Project Management</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4">
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

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="" class="form-control" name="status" id="status"
                                placeholder="Status">
                                <span class="text-danger error ">
                                @error('status')
                                {{$message}}
                                @enderror
                        </span>
                                
                        </div>

                            <button type="submit" class="btn btn-success">Submit</button>
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
@endsection