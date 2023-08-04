@extends('layouts.admin-app')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-title p-3">Update Document</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <form action="{{ url('admin/update_document') }}" method="post" id="update" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">

                            <div>
                                <label><b>Project Id</b></label>
                                <input type="text" name="project_id" id="project_id" value="{{ $users->project_id }}"
                                    class="form-control">
                                <span class="text-danger  ">
                                    @error('project_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <br>

                            <div>
                                <label><b>Category Id</b></label>
                                <input type="text" name="category_id" id="category_id" value="{{ $users->category_id }}"
                                    class="form-control">
                                <span class="text-danger  ">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <br>

                            <div>
                                <label><b>Document Type Id</b></label>
                                <input type="text" name="document_type_id" id="document_type_id"
                                    value="{{ $users->document_type_id }}" class="form-control">
                                <span class="text-danger  ">
                                    @error('document_type_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <br>

                            <div>
                                <label><b>Title</b></label>
                                <input type="text" name="title" id="title" value="{{ $users->title }}"
                                    class="form-control">
                                <span class="text-danger  ">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <br>
                            <div class="form-group">
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
                            <br>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="" class="form-control" name="status" id="status"
                                    value="{{ $users->status }}" placeholder="Status">
                                <span class="text-danger  ">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
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
                    status: {
                        required: "*Update your  status",

                    },
                }

            });
        });
    </script>
@endsection
