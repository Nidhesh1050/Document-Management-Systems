@extends('layouts.admin-app')

@section('content')
    
<div class="content">
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <form action="{{url('admin/register')}}" method="post" id="validate">
                        @csrf
                        <div class="form-group">
                            <h1>Add Document Name</h1>
                            <label for="name">Name</label>
                            <input type="name" class="form-control"
                                placeholder="Enter Name" name="name">
                                <span class="text-danger  ">
                                    @error('name')
                                    {{$message}}    
                                    @enderror
                                </span>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
        
</div>

<script>
   $(document).ready(function(){
    // validate  form using jquey
        $("#validate").validate({
            rules: {
                name: {
                    required:true,
                    minlength:4,
                    maxlength:20,
                },
               
            },
            messages: {
                name: {
                    required:"*Please enter your Name",
                },
            }
        });
    });
</script>
@endsection

