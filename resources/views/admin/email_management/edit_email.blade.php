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
                    <a href="#">Email Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Update Email_Type</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Email_Type</div>
                    </div>
                    <div class="card-body">

<form action="{{url('admin/update')}}" id="form" method="POST">
            @csrf
                <input type="hidden" name="id" value="{{$users->id}}">
                <div class="form-group">
                    <label>Email_type</label>
                    <input type="text" name="email_type" id="email_type" value="{{$users->email_type}}" class="form-control" >
                    <span class="text-danger  ">
                                        @error('email_type')
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

<script>
$(document).ready(function() {
    $("#form").validate({
        rules: {
            
            email_type: "required",
          
          
        },
        messages: {
           
            email_type: "Please enter  email_type",
           
           

        }

    });
});
</script>
@endsection




