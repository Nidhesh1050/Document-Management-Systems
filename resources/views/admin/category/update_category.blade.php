@extends('layouts.admin-app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title"> Update Category</div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 col-lg-4">
                            <form action="{{url('admin/edit_category')}}" method="post" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" name="id" value="{{$users->id}}">

                                <div class="form-group">
                                    <label for="name">Parent ID</label>
                                    <select name="parent_id" class="form-control">
                                        <option value=""> Please Select</option>
                                    @foreach($parent_categories as $parent)
                                    <option value="{{$parent->id}}" 
                                        @if($parent->id == $users->parent_id)
                                        echo 'selected="selected"';
                                        @endif >{{$parent->name}}

                                    </option>
                                    @endforeach
                                    
                                </select>
                                
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$users->name}}"
                                        placeholder="name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="comment"
                                        placeholder="write text" rows="5">
                                            {{$users->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"> Image</label>
                                    <input type="file" class="form-control-file"   value ="{{ $users->image }}" name="image"
                                        id="exampleFormControlFile1">
                                    <img src="{{ asset('images/' .$users->image) }}"
                                        style="height: 50px;width:100px;">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="" class="form-control" value="{{$users->status}}" name="status"
                                        id="status" placeholder="Status">
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection