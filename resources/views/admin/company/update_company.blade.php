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
                        <a href="#">Edit Company</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Company</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/edit_company') }}" id="edit_company" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $company_data->id }}">
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Coampany Name</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control" value="{{$company_data->company_name}}">
                                    <span class="text-danger" id="company_err">
                                        @error('company_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Owner Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        @error('owner_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mobile No</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        @error('mobile')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                                  <label for="name">Logo</label>
                                                  <div class="upload-img-box mb-25">
                                                       <input type="file" class="form-control" name="logo" id="file"
                                                            accept="image/*"  value="{{ $company_data->logo }}">
                                                  </div>
                                                  <div class="clear"></div>
                                                  <div id="previewimage">
                                                       <img src="{{asset('images/logo/'.@$company_data->logo)}}"
                                                            width="100px" />
                                                  </div>
                                                  <p>{{ __('Accepted Image Files') }}: JPEG, JPG, PNG <br>
                                                       {{ __('Accepted Size') }}: 300 x
                                                       300 (1MB)</p>
                                             </div>
                                            </div>
                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success" id="submit">Update</button>
                                    <a href="{{ url('admin/view_company') }}" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                            </form>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#edit_company").validate({
                                    rules: {

                                        company_name: "required",
                                    },
                                    messages: {
                                        company_name: "*Update  company name",
                                    }

                                });
                            });
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#company_name + img').remove();
            $('#previewimage').after('<img src="'+e.target.result+'" width="100" height="100"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

    $("#company_name").blur(function(){
   // alert('aaaa');
    var company_name = $(this).val();
    $.ajax({
      type: "GET",
      url: "/admin/checkCompany?company_name="+company_name,
      
      success: function(response) 
      { 
        console.log(response);
        if(response == 1){
          $('#company_err').text('This company is already exist');
          $('#submit').attr('disabled','disabled');
        }
        else{
          $('#company_err').text('');
          $('#submit').removeAttr('disabled');
        }
      },
      error: function(response) 
      {
        
      }
    });
  });
 </script>
@endsection
