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
                    <a href="#">Add Category</a>
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


                        <div class="card-title">Add Category</div>
                    </div>
                    <div class="card-body">
                <form action="{{url('admin/add_category')}}" method="post" id="category"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Parent ID</label>
                             <select name="parent_id" class="form-control">
                            <option value=""> Please Select</option>
                            @foreach($parent_categories as $parent)
                            <option value="{{$parent->id}}">{{$parent->name}}</option>
                            @endforeach
                          </select>
                          </div>



                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="Name">
                            <span class="text-danger error ">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>

                        </div

                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <input type="textarea" class="form-control" name="description" id="comment" cols="" row="5" />            
                            <span class="text-danger error ">
                                @error('description')
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

<script>
$(document).ready(function() {



    $("#category").validate({
        rules: {
            parent_id: "required",
            name: "required",
            description: "required",
            image: "required",
            status: "required",
        },
        messages: {
            parent_id: "Please select parent name",
            name: "Please enter your Name",
            description: "Please enter  description",
            image: "Chose any image",
            status: "Please enter status",

        }


    });
});
</script>

@endsection
