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
                    <a href="#">Settings Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Logo</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Logo</div>
                    </div>
                    <div class="card-body">

                    <form action="{{url('/admin/add_image')}}" method="post" id="category"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                        <label for="exampleFormControlFile1"> Image</label>
                        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            <span class="text-danger error ">
                                @error('image')
                                {{$message}}
                                @enderror
                            </span>  
                        </div>
                            
                       


                        <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                        <div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $("#category").validate({
        rules: {
            image: "required",
        },
        messages: {
            image: "Please select image",
      
        }
    });
});
</script>
@endsection