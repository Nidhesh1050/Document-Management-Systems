@extends('layouts.admin-app')

@section('content')
<?php 
use app\Models\User;
?>
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
                    <a href="#">Project Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"> Project List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                <div class="card-header">
                        <div class="d-flex align-items-center">
                            <a href="{{ url('admin/project_management') }}"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Project
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

    <table id="datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
               <th>S.No</th>
                <th> Project Name</th>   
                <th> Manager Id </th>
                <th> Status</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $users )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td> {{$users->project_name}}</td>
                    <td> {{ User::getUserID($users->manager_d) }}</td>
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



