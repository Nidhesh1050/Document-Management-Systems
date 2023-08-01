@extends('layouts.admin-app')
@section('content')

<div class="content">

    <div class="card-header">
        <div class="d-flex align-items-center">

            <a href="{{url('admin/add_document')}}"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                    data-target="">
                    <i class="fa fa-plus"></i>
                        Add User
                </button>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table id="datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th> Document Name</th>
                    <th> Status</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $users)
                <!-- @php
                        // $status = "";
                        $status = $users->status == 1 ? 'Active' : 'InActive';
                    @endphp -->
              <tr>
                <td>{{ $users->name }}</td>
                <td>{{ $status }}</td>
                <td>
                             <div class="form-button-action">
                                <a href="edit/{{ $users->id }}">
                                    <button type="button" data-toggle="tooltip" title=""
                                        class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit">
                                        </i>
                                    </button>
                                </a>
                                <a href="delete/{{ $users->id }}"
                                    onclick="return confirm('Are you sure to delete ?')">
                                    <button type="button" data-toggle="tooltip" title=""
                                        class="btn btn-link btn-danger" data-original-title="Remove">
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
