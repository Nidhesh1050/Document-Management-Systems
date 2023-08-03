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
                    <a href="#">Notification Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Update </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Notification</div>
                    </div>
                    <div class="card-body">   
        <form action="{{url('admin/update_notification')}}" method="POST">
            @csrf
                <input type="hidden" name="id" value="{{$users->id}}">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$users->title}}" class="form-control" >
                    
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="textarea" name="description" value="{{$users->description}}" class="form-control" >
                    
                </div>
              
                <div class="text-right">
                         <button type="submit" class="mt-4 btn btn-success">Submit</button>
                         <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                <div>
        </form>
    </div>   
</div>

@endsection