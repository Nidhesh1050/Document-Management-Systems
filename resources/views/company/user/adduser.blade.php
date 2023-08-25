@extends('layouts.company-app')

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
                    <a href="#">Add User</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add User</div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/register_user')}}" method="post" id="validate">
                            @csrf
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="name">Company Name</label>
                                    <select name="company_name" class="form-control">
                                        <option value=""> Please Select</option>
                                        @foreach($company_name as $company_name)
                                        <option value="{{$company_name->id}}"> <?php echo $company_name->company_name;?>
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger  ">
                                        @error('company_name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        name="name" onkeypress="return /[A-Za-z/ _-]/i.test(event.key)">
                                    <span class="text-danger  ">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                        name="email">
                                    <span class="text-danger  ">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter your password" name="password">
                                    <span class="text-danger  ">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile"
                                        name="mobile">
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
                                        @foreach($project_manager as $project_manager)
                                        <option value="{{$project_manager->id}}"> <?php echo $project_manager->name;?>
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger  ">
                                        @error('user_type')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('admin/userManagement')}}" class="mt-4 btn btn-danger">Cancel</a>
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
    // validate  form using jquey
    $("#validate").validate({
        rules: {
            name: {
                required: true,
                minlength: 4,
                maxlength: 20,
            },
            company_name: {
                required: true,
            },
            
            email: {
                required: true,
                email: true
            },
            
            mobile: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 12,
            },
            designation: {

                required: true,
            },
            password: {

                required: true,
                minlength: 8
            },
           
        },
        messages: {
            name: {
                required: "Please enter your Name",
                minlength: "Enter your name atleast 4 letters",
                maxlength: "Your name length should not be greater than 20 letters",
            },
            company_name: {
                required: "Please enter your commpany  Name",
            },
            email: {
                required: "Enter a e-mail address",
                email: "Email should be in @gmail.com",
            },
            mobile: {
                required: "Please enter your valid Mobile No.",
                number: "Please enter Mobile No. in numeric",
                minlength: "Atlest length should be 10",
                maxlength: "Length should not be greater than 12",
            },
            designation: {
                required: "Enter a valid designation",
            },
            password: {
                required: "Enter a valid password",
                minlength: "Password must be atlest 8 characters",
            },

        }

    });
});
</script>

@endsection
