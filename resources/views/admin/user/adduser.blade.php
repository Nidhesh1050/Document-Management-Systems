@extends('layouts.admin-app')

@section('content')
    
<div class="content">
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <form action="{{url('admin/register')}}" method="post" id="validate">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name"
                                placeholder="Enter Name" name="name">
                                <span class="text-danger  ">
                                    @error('name')
                                    {{$message}}    
                                    @enderror
                                </span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email"
                                placeholder="Enter Email" name="email">
                                <span class="text-danger  ">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="mobile" class="form-control" id="mobile"
                                placeholder="Enter Mobile" name="mobile">
                                <span class="text-danger  ">
                                    @error('mobile')
                                    {{$message}}
                                    @enderror
                                </span>

                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation"
                                placeholder="Enter your designation" name="designation">
                                <span class="text-danger  ">
                                    @error('designation')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username"
                                placeholder="Enter your username" name="username">
                                <span class="text-danger  ">
                                    @error('username')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password"
                                placeholder="Enter your password" name="password">
                                <span class="text-danger  ">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
        
</div>
   

<script>
   $(document).ready(function(){
    // validate  form using jquey
        $("#validate").validate({
            rules: {
                name: {
                    required:true,
                    minlength:4,
                    maxlength:20,
                },
                email: {
                    required: true,
                    email: true
                },
                username:{

                    required:true,
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 12,
                },
                designation:{

                    required:true,
                },
                password:{

                    required:true,
                    minlength: 8
                },
            },
            messages: {
                name: {
                    required:"*Please enter your Name",
                    minlength:"*Enter your name atleast 4 letters",
                    maxlength:"*Your name length should not be greater than 20 letters",
                },
                email: {
                    required:"*Enter a valid E-mail address",
                    email: "*Email should be in @gmail.com",
                },
                username:{
                    required:"*Enter a valid username",
                },
                mobile: {
                    required: "*Please enter your Valid Mobile No.",
                    number: "*Please enter Mobile No. in numeric",
                    minlength: "*Atlest length should be 10",
                    maxlength: "*Length should not be greater than 12",
                },
                designation:{
                    required:"*Enter a valid designation",
                },
                password:{
                    required:"*Enter a valid password",
                    minlength: "*Password must be atlest 8 characters",
                },
            }

        });
    });
</script>

@endsection
