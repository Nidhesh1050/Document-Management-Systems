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
                    <a href="#">Document Type</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"> Document List</a>
                </li>
            </ul>
        </div>
        
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
            <a href="{{url('admin/add_document')}}"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                    data-target="">
                    <i class="fa fa-plus"></i>
                        Add Document Type
                </button>
            </a>
        </div>
    </div>
@endsection
