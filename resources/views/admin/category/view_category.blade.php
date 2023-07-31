
@extends('layouts.admin-app')

@section('content')
<div class="content">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <a href="{{url('admin/category')}}"
            class="btn btn-primary btn-round ml-auto" >
                <i class="fa fa-plus"></i>
                Add Category
            </a>
        </div>
    </div>

    <table id="datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th> Id</th>
                <th> Parent ID </th>
                <th> Name </th>
                <th> Description</th>
                <th> Image </th>
                <th> Edit</th>
                <th> delete</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($users as $users )
                <tr>
                    <td> {{$users->id}}</td>
                    <td> {{$users->parent_id}}</td>
                    <td> {{$users->name}}</td>
                    <td> {{$users->description}}</td>
                    <td>  <img src="{{ asset('images/' .$users->image) }}" style="height: 50px;width:100px;">
                    </td>
                    <td>
                        <div class="form-button-action">

                            <a href='/admin/update_category/{{ $users->id }}'>
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                <i class="fa fa-edit">
                                </i>
                            </button>
                        </a>
                        </div>
                    </td>
                    <td>
                        <div class="form-button-action">
                            <a href="/admin/delete_category/{{ $users->id }}" onclick="return confirm('Are you sure to delete ?')">
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                        </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 </div>



@endsection



