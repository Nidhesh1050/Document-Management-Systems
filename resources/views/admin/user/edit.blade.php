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
                            <input type="hidden" name="id" value="{{$users->id }}">
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Company Name</label>
                                    <select name="company_name" class="form-control">
                                        <option value=""> Please Select</option>
                                        {{}}
                                        <?php foreach($company_name as $company_name){?>

                                            
                                        <option <?php if(@$users->company_id == $company_name->id){?>selected
                                            <?php } ?> value="{{$company_name->id}}">{{@$company_name->company_name}}
                                        </option>
                                        <?php }?>

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
                                        value="{{$users->name}}" name="name"
                                        onkeypress="return /[A-Za-z/ _-]/i.test(event.key)">
                                    <span class="text-danger  ">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email Address *</label>
                                    <input type="email" class="form-control" id="user_email" placeholder="Enter Email"
                                        value="{{$users->email}}" name="email">
                                    <span class="text-danger  " id="email_err">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="user_mobile" placeholder="Enter Mobile"
                                        value="{{ $users->mobile }}" name="mobile">
                                    <span class="text-danger  " id="mobile_err">
                                        @error('mobile')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="designation">User Type</label>
                                    <select name="user_type" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($project_manager as $project_manager){?>
                                        <option <?php if($users->user_type == $project_manager->id){?>selected
                                            <?php } ?> value="{{$project_manager->id}}">{{$project_manager->name}}
                                        </option>
                                        <?php }?>
                                    </select>
                                    <span class="text-danger  ">
                                        @error('user_type')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>

                            </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
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

    $.validator.addMethod("indianMobile", function(value, element) {
        return this.optional(element) || /^[6789]\d{9}$/.test(value);
    }, "Please enter a valid  mobile number");

    $.validator.addMethod("customEmail", function(value, element) {
        return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value);
    }, "Please enter a valid email address");

   m $("#form").validate({
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
                customEmail: true,
            },

            mobile: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 12,
                indianMobile: true,
            },
            // user_type: {
            //     required: true,
            // },


        },
        messages: {
            name: {
                required: "Please enter your name",
            },
            company_name: {
                required: "Please enter your company  name",
                // minlength: "Enter your commpany name atleast 4 letters",
                // maxlength: "Your commpany name length should not be greater than 20 letters",
            },
            email: {
                required: "Enter a valid email address",
            },
            mobile: {
                required: "Please enter your valid mobile no.",
                number :"Mobile number should be number only",
            },
            // user_type: {
            //     required: "*Enter a valid user type",
            // },


        }

    });
});

//check email

$("#user_email").blur(function() {
    // alert('aaaa');
    var email = $(this).val();
    id = <?php echo $users->id ?>;
    console.log(id);
    $.ajax({
        type: "GET",
        url: "/admin/checkUserEmail",
        data: {
            'email': email,
            'id': id
        },
        success: function(response) {
            console.log(response);
            if (response == 1) {
                $('#email_err').text('This email is already exist');
                $('#subit').attr('disabled', 'disabled');
            } else {
                $('#email_err').text('');
                $('#submit').removeAttr('disabled');
            }
        },
        error: function(response) {

        }
    });
});

//check mobile


$("#user_mobile").blur(function() {
    // alert('aaaa');
    var mobile = $(this).val();
    id = <?php echo $users->id ?>;
    console.log(id);
    $.ajax({
        type: "GET",
        url: "/admin/checkUserMobile",
        data: {
            'mobile': mobile,
            'id': id
        },
        success: function(response) {
            console.log(response);
            if (response == 1) {
                $('#mobile_err').text('This mobile is already exist');
                $('#submit').attr('disabled', 'disabled');
            } else {
                $('#mobile_err').text('');
                $('#submit').removeAttr('disabled');
            }
        },
        error: function(response) {

        }
    });
});
</script>

@endsection