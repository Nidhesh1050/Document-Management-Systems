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
                        <a href="{{ url('admin/view_company') }}">Company Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Company</a>
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
                                <a href="{{ url('admin/addcompany') }}"><button class="btn btn-primary btn-round ml-auto"
                                        data-toggle="modal" data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        Add Company
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th> Company Name</th>
                                            <th> Owner Name</th>
                                            <th> Email</th>
                                            <th> Mobile No </th>
                                            <th> Logo</th>
                                            
                                            <th> Action </th>
                                            <!-- <th> Delete </th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($company_data as $company_data)
                                    
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $company_data->company_name }}</td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> <img src="{{ asset('images/logo/' . $company_data->logo) }}"
                                                        style="height: 50px;width:100px;"></td>
                                                <td>
                                                 <div class="form-button-action">
                                                        <a href='/admin/update_company/{{ $company_data->id }}'>
                                                            <button type="button" data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="Edit Task">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="/admin/delete_company/{{ $company_data->id }}"
                                                            onclick="return confirm('Are you sure you want to delete this company ?')">
                                                            <button type="button" data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-danger"
                                                                data-original-title="Remove">
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
                        </div>
                    @endsection
