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
                    <a href="{{url('admin/documentType_view')}}">Document Type</a>
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

                        <form action="{{url('admin/documentType_update')}}" method="post" id="validateform">
                            @csrf
                            <input type="hidden" name="id" value="{{ $documentTypes->id }}">
                            <div class="form-group">
                                <label for="name">Document Type Name</label>
                                <input type="name" class="form-control" placeholder="Enter Name" name="name"
                                    value="{{ $documentTypes->name }}">
                                <span class="text-danger error ">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                    <span>
                            </div>
                            <div class="text-right">
                                <button type="update" class="mt-4 btn btn-success">Update</button>
                                <a href="{{url('admin/documentType_view')}}" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function(){
        $("#validateform").validate({
            rules: {
                name: {
                    required:true,
        
                },

            },
            messages: {
                name: {
                    required:"Please enter name",
                },
            }
        });
    });
</script>

@endsection