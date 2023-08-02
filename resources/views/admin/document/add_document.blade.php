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
                    <a href="#">Category Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Document</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Document</div>
                    </div>
                    <div class="card-body">
                    <form action="{{url('admin/register')}}" method="post" id="validate">
                        @csrf
                        <div class="form-group">
                            <h1>Add Document Name</h1>
                            <label for="name">Name</label>
                            <input type="name" class="form-control"
                                placeholder="Enter Name" name="name">
                                <span class="text-danger  ">
                                    @error('name')
                                    {{$message}}    
                                    @enderror
                                </span>
                        </div>
                        
                        <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                            <div>                    </form>


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
               
            },
            messages: {
                name: {
                    required:"*Please enter your Name",
                },
            }
        });
    });
</script>
@endsection

