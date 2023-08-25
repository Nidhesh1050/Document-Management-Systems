@extends('layouts.company-app')

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
                <th> S.NO</th>
                <th> Project Name</th>
                <th> Project Description</th>      
                <th> Manager Name </th>
                <th> Status</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $users )
            @php
                     $status = $users->status == 1 ? 'Active' : 'InActive';
                                        @endphp
                <tr>
                <td>{{$loop->iteration}}</td>
                    <td> {{$users->project_name}}</td>
                    <td><?php echo $users->description ?></td>
                    <td> {{$users->name}}</td>
                    <td> {{$status}}</td>

                    <td>
                        <div class="form-button-action">
                            <a href='/admin/update_project/{{ $users->id }}'>
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                <i class="fa fa-edit">
                                </i>
                            </button>
                          </a>
                        </div>
                        <div class="form-button-action">
                            <a href="/admin/delete_project/{{ $users->id }}" onclick="return confirm('Are you sure you want to delete this project ?')">
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



