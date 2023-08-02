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
                    <a href="#">Update Category</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Category</div>
                    </div>
                    <div class="card-body">
                            <form action="{{url('admin/edit_category')}}" method="post" enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" name="id" value="{{$users->id}}">

                                <div class="form-row">
                                   <div class="form-group col-md-6">
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

                                <div class="form-group  col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$users->name}}"
                                        placeholder="name">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="comment"
                                        placeholder="write text" rows="2">
                                            {{$users->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1"> Image</label>
                                    <input type="file" class="form-control-file"   value ="{{ $users->image }}" name="image"
                                        id="exampleFormControlFile1">
                                    <img src="{{ asset('images/' .$users->image) }}"
                                        style="height: 50px;width:100px;">
                                </div>
</div>
                                <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                               <div>  
                                

                        </div>
                        <form>
                        
        
</div>

@endsection