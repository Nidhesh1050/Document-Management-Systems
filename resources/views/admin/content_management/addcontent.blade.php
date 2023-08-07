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
                    <a href="#">Content Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Content</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Content</div>
                    </div>
                    <div class="card-body">
                 
             <form action="{{url('admin/add_content')}}" method="post" id="content"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="title">
                             <span class="text-danger error">
                                @error('title')
                                {{$message}}
                                @enderror
                            </span>
                          
                        </div>
                        <div class="form-group col-md-6"></div>

                         <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control"  name="description" id="editor"
                                placeholder="write text">
                                            </textarea>
                                            <span class="text-danger error ">
                                @error('description')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" name="image"
                                id="image">
                                <span class="text-danger error ">
                                @error('image')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                          <div class="form-group">
                          <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <input type="checkbox"  name="status" id="status" value="1"
                                placeholder="Status">
                                <span class="text-danger error ">
                                @error('status')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        
                        <div class="text-right">
                             <button type="submit" class="mt-4 btn btn-success">Submit</button>
                             <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                    
                        </form>
                    </div>

                </div>
            </div>
        </div>  
    </div>
</div>

<script>
$(document).ready(function() {
    $("#content").validate({
        rules: {
            
            title: "required",
            description: "required",
            image: "required",
            status: "required",
        },
        messages: {
           
            title: "Please enter your title",
            description: "Please enter  description",
            image: "Choose any image",
            status: "Please enter Status",

        }

    });
});
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
            
        } );
</script>

@endsection


