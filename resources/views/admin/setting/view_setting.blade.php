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
                    <a href="{{url('admin/view_image')}}">Side Setting</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Logo List</a>
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
                    </div>
                    <div class="card-body">

                        <table id="datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> Id</th>
                                    <th> Image </th>
                                    <th> Edit</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $users )
                                <tr>
                                    <td> {{$users->id}}</td>
                                    <td> <img src="{{ asset('images/' .$users->image) }}"
                                            style="height: 50px;width:100px;"></td>

                                    <td>
                                        <div class="form-button-action">

                                            <a href="{{url('/admin/edit_image')}}">
                                                <button type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task">
                                                    <i class="fa fa-edit">
                                                    </i>
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