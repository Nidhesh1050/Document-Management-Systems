
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
                    <a href="#">Email Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Email_Content</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Email_Content</div>
                    </div>
                   <div class="card-body">
                   <form action="add_content" id="form" method="POST">
            @csrf

                <div class="form-group">
                    <label>Email_type</label>
                    
                    <select name="email_type" id="email_type" class="form-control">
                        @foreach($users as $users)
                            <option value="{{$users->id}}"> <?php echo $users->email_type;?></option>
                            @endforeach
                    </select>
                    <span class="text-danger  ">
                                        @error('email_type')
                                        {{$message}}
                                        @enderror
                                    </span>
                </div>
                
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" >
                    <span class="text-danger  ">
                                        @error('subject')
                                        {{$message}}
                                        @enderror
                                    </span>
                </div>
                
                <div class="form-group">
                    <label>Message</label>
                    <input type="text" name="message" id="message" class="form-control" >
                    <span class="text-danger  ">
                                        @error('message')
                                        {{$message}}
                                        @enderror
                                    </span>
                </div>
                

            
                <div class="text-right">
                      <button type="submit" class="mt-4 btn btn-success">Submit</button>
                      <a href="{{url('admin/home')}}" class="mt-4 btn btn-danger">Cancel</a>
                 <div>
        </form>
                        
        
                     </div>




                     <script>
$(document).ready(function() {
    $("#form").validate({
        rules: {
            
            email_type: "required",
            subject: "required",
            message: "required",
          
        },
        messages: {
           
            email_type: "Please enter  email_type",
            subject: "Please enter  subject",
            message: "Please  enter message",
           

        }

    });
});
</script>
@endsection








