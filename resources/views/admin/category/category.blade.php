@extends('layouts.admin-app')

@section('content')

<div class="content">
    <div class="card">
        <div class="card-title p-3">Category Form</div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <form action="{{url('admin/add_category')}}" method="post" id="category"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Parent Id</label>
                        <select name="parent_id" class="form-control">
                            <option value=""> Please Select</option>
                            @foreach($parent_categories as $parent)
                            <option value="{{$parent->id}}">{{$parent->name}}</option>
                            @endforeach
                        </select>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="name">
                            <span class="text-danger error ">
                                @error('name')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="comment"
                                placeholder="write text" rows="5">
                                            </textarea>
                            <span class="text-danger error ">
                                @error('description')
                                {{$message}}
                                @enderror
                            </span>


                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1"> Image</label>
                            <input type="file" class="form-control-file" name="image"
                                id="exampleFormControlFile1">
                            <span class="text-danger error ">
                                @error('image')
                                {{$message}}
                                @enderror
                            </span>
                        </div>



                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="" class="form-control" name="status" id="status"
                                placeholder="Status">
                            <span class="text-danger error ">
                                @error('status')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
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
            parent_id: "required",
            name: "required",
            description: "required",
            image: "required",
            status: "required",
        },
        messages: {
            parent_id: "Please select parent_id",
            name: "Please enter your Name",
            description: "Please enter  description",
            image: "Chose any image",
            status: "Please enter Status",

        }


    });
});
</script>

@endsection