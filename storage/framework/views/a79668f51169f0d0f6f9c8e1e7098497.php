<?php $__env->startSection('content'); ?>

    <div class="content">

        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?php echo e(url('admin/home')); ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('admin/view_company')); ?>">Company Management</a>
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
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Company</div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(url('/admin/add_company')); ?>" id="company" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Owner Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        <?php $__errorArgs = ['owner_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                               
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mobile No</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control">
                                    <span class="text-danger" id="company_err">
                                        <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                                  <label for="name">Logo</label>
                                                  <div class="upload-img-box mb-25">
                                                       <input type="file" class="form-control" name="logo" id="file"
                                                            accept="image/*">
                                                  </div>
                                                  <div class="clear"></div>
                                                  <div id="previewimage"></div>
                                                  <p><?php echo e(__('Accepted Image Files')); ?>: JPEG, JPG, PNG <br>
                                                       <?php echo e(__('Accepted Size')); ?>: 300 x
                                                       300 (1MB)</p>
                                             </div>
                                             <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter your password" name="password">
                                    <span class="text-danger  ">
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                                 </div>
                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success" id="submit">Submit</button>
                                    <a href="<?php echo e(url('admin/view_company')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                            </form>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#company").validate({
                                    rules: {

                                        company_name: "required",
                                        
                                        name: {
                                            required: true,
                                        },
                                        
                                        email: {
                                            required: true,
                                            email: true
                                        },
                                        
                                        mobile: {
                                            required: true,
                                            number: true,
                                            minlength: 10,
                                            maxlength: 12,
                                        },
                                        password: {

                                        required: true,
                                        minlength: 8
                                        },
                                    },
                                    messages: {
                                        company_name: "Please enter company name",

                                        name: {
                                            required: "Please enter your  Owner Name",
                                        },
                                        email: {
                                            required: "Enter a e-mail address",
                                            email: "Email should be in @gmail.com",
                                        },
                                        mobile: {
                                            required: "Please enter your valid Mobile No.",
                                            number: "Please enter Mobile No. in numeric",
                                            minlength: "Atlest length should be 10",
                                            maxlength: "Length should not be greater than 12",
                                        },
                                        password: {
                                            required: "Enter a valid password",
                                            minlength: "Password must be atlest 8 characters",
                                        },

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
// $('#uploadForm + embed').remove();
// $('#uploadForm').after('<embed src="'.target.result+'" width="450" height="300">');

$("#file").change(function () {
	
  filePreview(this);
    
});
              
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/company/add_company.blade.php ENDPATH**/ ?>