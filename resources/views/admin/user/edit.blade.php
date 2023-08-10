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
                    <a href="{{url('admin/userManagement')}}">User Management</a>
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

                        <div class="card-title">Edit User</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/update_user') }}" method="post" id="form">

                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        value="{{$users->name}}" name="name" onkeypress="return /[A-Za-z/ _-]/i.test(event.key)">
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
                                    <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile"
                                        value="{{ $users->mobile }}" name="mobile">
                                    <span class="text-danger  ">
                                        @error('mobile')
                                        {{$message}}
                                        @enderror
                                    </span>

                                </div>


                                <div class="form-group col-md-6">
                                    <label for="designation">User Type</label>

                                    <select name="user_type" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($project_manager as $project_manager){?>
                                        <option <?php if($users->user_type == $project_manager->id){?>selected <?php } ?> value="{{$project_manager->id}}">{{$project_manager->name}}</option>
                                        <?php }?>
                                    </select>
                                    <span class="text-danger  ">
                                        @error('user_type')
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
                            <div class="form-group col-md-6">
                                <label for="company_name">Company Name</label>
                                <input type="company_name" class="form-control" id="company_name"
                                    placeholder="Enter company name" value="{{ $users->company_name }}" name="company_name">
                                <span class="text-danger  ">
                                    @error('company_name')
                                    {{$message}}
                                    @enderror
                                </span>
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
            user_type: {

                required: true,
            },
            company_name:{
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
            user_type: {
                required: "*Enter a valid user type",
            },
            company_name:{
                    required: "*Enter a company name",
                },


        }

    });
});
</script>

@endsection
