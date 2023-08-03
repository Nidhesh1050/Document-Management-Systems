@extends('layouts.admin-app')

@section('content')
    
<div class="content">
    
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('admin/notification')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Notification Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Notification</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Notification</div>
                    </div>
                    <div class="card-body">   
        
        <form action="add_notification" id="form" method="POST">
            @csrf

                <div class="form-group col-md-6">
                    <label>Title</label>
                    <input type="text" name="title" id="title" class="form-control" >
                </div>
                <div>
                    @error('title')
                     {{$message}}
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Description</label>
                    <input type="textarea"  name="description"  id="description" class="form-control" >
                </div>
                <div>
                    @error('description')
                     {{$message}}
                    @enderror
                </div>
            
                <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                            <div>
        </form>


 </div>   
</div>
<script>
if ($("#form").length > 0) {
$("#form").validate({
rules: {
title: {
required: true,

},
description: {
required: true,
},
},
messages: {
title: {
required: "Please enter title",
},
description: {
required: "Please enter description",
},
},
})
} 
</script>
@endsection