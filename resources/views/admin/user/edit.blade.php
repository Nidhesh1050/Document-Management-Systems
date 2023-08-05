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
                    <a href="#">User Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit User</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit User</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/update_user') }}" method="post" id="form">

                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="name" class="form-control" id="name" placeholder="Enter Name"
                                        value="{{$users->name}}" name="name">
                                    <span class="text-danger  ">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                        value="{{$users->email}}" name="email">
                                    <span class="text-danger  ">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="mobile" class="form-control" id="mobile" placeholder="Enter Mobile"
                                        value="{{ $users->mobile }}" name="mobile">
                                    <span class="text-danger  ">
                                        @error('mobile')
                                        {{$message}}
                                        @enderror
                                    </span>

                                </div>


                                <div class="form-group col-md-6">
                                    <label for="designation">User Type</label>

                                    <!-- <input type="text" class="form-control" id="designation"
                                        placeholder="Enter your User Type" value="{{ $users->name }}"
                                        name="designation"> -->

                                    <select name="designation" class="form-control">
                                        <option value=""> Please Select</option>

                                        @foreach($project_manager as $project_manager)
                                        <option value="{{$project_manager->id}}"> <?php echo $project_manager->name;?>
                                        </option>
                                        @endforeach

                                    </select>


                                    <span class="text-danger  ">
                                        @error('designation')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username"
                                        placeholder="Enter your username" value="{{ $users->username }}"
                                        name="username">
                                    <span class="text-danger  ">
                                        @error('username')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
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

<script>
$(document).ready(function() {

    $("#form").validate({
        rules: {
            name: {
                required: true,

            },
            email: {
                required: true,

            },
            username: {

                required: true,
            },
            mobile: {
                required: true,
            },
            designation: {

                required: true,
            },

        },
        messages: {
            name: {
                required: "*Please enter your Name",
            },
            email: {
                required: "*Enter a valid E-mail address",
            },
            username: {
                required: "*Enter a valid username",
            },
            mobile: {
                required: "*Please enter your Valid Mobile No.",
            },
            designation: {
                required: "*Enter a valid designation",
            },

        }

    });
});
</script>

@endsection