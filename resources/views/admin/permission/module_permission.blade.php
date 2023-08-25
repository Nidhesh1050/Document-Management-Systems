@extends('layouts.admin-app')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ url('admin/home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Permission</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Module Permission</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
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
                            <div class="d-flex align-items-center">
                                <a><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#addRowModal">
                                        <i class="fa fa-show"></i>
                                        Module Permission
                                    </button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <form action="{{ url('/admin/module_permission') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h2>User:</h2>
                                        </div>
                                        <div>
                                            <select name="user_id" class="form-control input-solid">

                                                <option value="">Please Select</option>
                                                @foreach ($modules as $modules)
                                                    <option value="{{ $modules->id }}">{{ $modules->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <table id="" class="display table table-striped table-hover">

                                        <thead>
                                            <tr>
                                                <th>Module Id</th>
                                                <th>Module Name</th>
                                                <th>Add</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $users)
                                                <tr>

                                                    <td> {{ $users->id }}</td>
                                                    <td> {{ $users->module_name }}</td>
                                                    <input type="hidden" name="id[]" value="{{ $users->id }}">
                                                    <td>
                                                        <input class="form-check-input" type="checkbox"
                                                            name="add[{{ $users->id }}]"
                                                            value="{{ $users->module_name }}" id="add-checkbox-{{ $users->id }}" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox"
                                                            name="edit[{{ $users->id }}]"
                                                            value="{{ $users->module_name }}" id="edit-checkbox-{{ $users->id }}" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox"
                                                            name="delete[{{ $users->id }}]"
                                                            value="{{ $users->module_name }}" id="delete-checkbox-{{ $users->id }}" />
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox"
                                                            name="view[{{ $users->id }}]"
                                                            value="{{ $users->module_name }}" id="view-checkbox-{{ $users->id }}" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="text-right">
                                        <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                        <a href="{{ url('admin/module_permission') }}" class="mt-4 btn btn-danger">Cancel</a>
                                        <div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
                            $(document).ready(function() {



                                $("input[type='checkbox']").on("click", function() {
                                    var userId = $(this).attr("id").split("-")[
                                    2]; 
                                    if ($("#add-checkbox-" + userId).prop("checked") || $(
                                            "#edit-checkbox-" + userId).prop("checked") || $(
                                            "#delete-checkbox-" + userId).prop("checked")) {
                                        $("#view-checkbox-" + userId).prop("checked", true);
                                    } else {

                                        $("#view-checkbox-" + userId).prop("checked", true);
                                    }
                                });

                                
                            });
                            </script>
@endsection


