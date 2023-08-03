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
                    <a href="#">Document Type</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Document Type </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Document Type</div>
                    </div>
                    <div class="card-body">
                    <form action="{{url('admin/update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $users->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" class="form-control"
                                placeholder="Enter Name" name="name" value="{{ $users->name }}">                             
                            </div>                        
                            <div class="text-right">
                                <button type="update" class="mt-4 btn btn-success">Update</button>
                                <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                            <div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>        
</div>

@endsection

