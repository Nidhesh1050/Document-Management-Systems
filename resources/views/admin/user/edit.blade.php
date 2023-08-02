@extends('layouts.admin-app')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="col-md-6 col-lg-4">
                <form action="{{ url('admin/update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $users->id }}">
                    <div>
                        <h2>Edit User</h2>
                    </div>
                    <br>
                    <!--Input elemets for form-->
                    <div>
                        <label><b>Name</b></label>
                        <input type="text" placeholder="Enter your first name" name="name" value="{{ $users->name }}"
                            class="form-control">
                    </div>
                    <div>
                        <label><b>E-mail</b></label>
                        <input type="email" placeholder="Enter your e-mail" name="email" value="{{ $users->email }}"
                            class="form-control">
                    </div>
                    <div>
                        <label><b>Mobile No.</b></label>
                        <input type="tel" placeholder="Enter your mobile no."name="mobile" value="{{ $users->mobile }}"
                            class="form-control">
                    </div>
                    <div>
                        <label><b>Designation</b></label>
                        <input type="text" placeholder="Enter your Designation" name="designation"
                            value="{{ $users->designation }}" class="form-control">
                    </div>
                    <div>
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter your Username" name="username"
                            value="{{ $users->username }}" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
