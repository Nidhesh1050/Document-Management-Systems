
@extends('layouts.admin-app')

@section('content')
<div class="content">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <a href="{{url('admin/project_management')}}"
            class="btn btn-primary btn-round ml-auto" >
                <i class="fa fa-plus"></i>
                Add Manager
            </a>
        </div>
    </div>

    <table id="datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th> Id</th>
                <th> Project Name</th>   
                <th> Manager Id </th>
                <th> Status</th>
                <th> Edit</th>
                <th> delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $users )
                <tr>
                    <td> {{$users->id}}</td>
                    <td> {{$users->project_name}}</td>
                    <td> {{$users->manager_d}}</td>
                    <td> {{$users->status}}</td>

                    <td>
                        <div class="form-button-action">

                            <a href='/admin/update_project/{{ $users->id }}'>
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                <i class="fa fa-edit">
                                </i>
                            </button>
                        </a>
                        </div>
                    </td>
                    <td>
                        <div class="form-button-action">
                            <a href="/admin/delete_project/{{ $users->id }}" onclick="return confirm('Are you sure to delete ?')">
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



