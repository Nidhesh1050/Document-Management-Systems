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
                <a href="{{url('admin/document')}}">Document Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Document</a>
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
                            
                        <div class="card-title">Edit Document </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/update_document') }}" method="post" id="update" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="form-row">
                               <div class="form-group col-md-6">
                                <label><b>Project Id</b></label>
                                <input type="text" name="project_id" id="project_id" value="{{ $users->project_id }}"
                                    class="form-control">
                                <span class="text-danger  ">
                                    @error('project_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>



                            <div class="form-group col-md-6">
                                <label><b>Category Id</b></label>
                                <input type="text" name="category_id" id="category_id" value="{{ $users->category_id }}"
                                    class="form-control">
                                <span class="text-danger  ">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>



                            <div class="form-group col-md-6">
                                <label><b>Document Type Id</b></label>
                                <input type="text" name="document_type_id" id="document_type_id"
                                    value="{{ $users->document_type_id }}" class="form-control">
                                <span class="text-danger  ">
                                    @error('document_type_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>



                            <div class="form-group col-md-6">
                                <label><b>Title</b></label>
                                <input type="text" name="title" id="title" value="{{ $users->title }}"
                                    class="form-control">
                                <span class="text-danger  ">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="form-group  col-md-6">
                                <label for="exampleFormControlFile1"> Upload document</label>
                                <input type="file" class="form-control-file" name="documents" id="documents"
                                    value="{{ $users->documents }}">
                                    <span>{{$users->documents}}</span>
                                <span class="text-danger  ">
                                    @error('documents')
                                        {{ $message }}
                                    @enderror
                                </span>
                                       </div>
</div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>

                        </form>
</div>
                    </div>

    <script>
        $(document).ready(function() {
            // validate  form using jquey
            $("#update").validate({
                rules: {
                    project_id: {
                        required: true,

                    },
                    category_id: {
                        required: true,

                    },
                    document_type_id: {

                        required: true,
                    },
                    title: {
                        required: true,

                    },
                    status: {

                        required: true,
                    },
                },
                messages: {
                    project_id: {
                        required: "*Update your project_id",

                    },
                    category_id: {
                        required: "*Update your valid category_id",

                    },
                    document_type_id: {
                        required: "*Update your document_type_id",
                    },
                    title: {
                        required: "*Update your title",

                    },


                }

            });
        });
    </script>
@endsection
