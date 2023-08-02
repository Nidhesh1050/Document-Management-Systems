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
                <a href="#">User Management</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Add User</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add User</div>
                </div>
                <div class="card-body">
                            <form action="<?php echo e(url('admin/register')); ?>" method="post" id="validate">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="name" class="form-control" id="name"
                                            placeholder="Enter Name" name="name">
                                            <span class="text-danger  ">
                                                <?php $__errorArgs = ['name'];
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
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Enter Email" name="email">
                                            <span class="text-danger  ">
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
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="mobile">Mobile</label>
                                        <input type="mobile" class="form-control" id="mobile"
                                            placeholder="Enter Mobile" name="mobile">
                                            <span class="text-danger  ">
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
                                    <div class="form-group col-md-6">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control" id="designation"
                                            placeholder="Enter your designation" name="designation">
                                            <span class="text-danger  ">
                                                <?php $__errorArgs = ['designation'];
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
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Enter your username" name="username">
                                            <span class="text-danger  ">
                                                <?php $__errorArgs = ['username'];
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
                                    <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                    <a href="<?php echo e(url('admin/home')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                            </form>
                </div>
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
                email: {
                    required: true,
                    email: true
                },
                username:{

                    required:true,
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 12,
                },
                designation:{

                    required:true,
                },
                password:{

                    required:true,
                    minlength: 8
                },
            },
            messages: {
                name: {
                    required:"*Please enter your Name",
                    minlength:"*Enter your name atleast 4 letters",
                    maxlength:"*Your name length should not be greater than 20 letters",
                },
                email: {
                    required:"*Enter a valid E-mail address",
                    email: "*Email should be in @gmail.com",
                },
                username:{
                    required:"*Enter a valid username",
                },
                mobile: {
                    required: "*Please enter your Valid Mobile No.",
                    number: "*Please enter Mobile No. in numeric",
                    minlength: "*Atlest length should be 10",
                    maxlength: "*Length should not be greater than 12",
                },
                designation:{
                    required:"*Enter a valid designation",
                },
                password:{
                    required:"*Enter a valid password",
                    minlength: "*Password must be atlest 8 characters",
                },
            }

        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_10\resources\views/admin/user/adduser.blade.php ENDPATH**/ ?>