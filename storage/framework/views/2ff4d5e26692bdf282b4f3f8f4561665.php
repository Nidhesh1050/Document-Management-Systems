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
                    <a href="#">Edit User</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit User</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('admin/update_user')); ?>" method="post" id="form">

                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($users->id); ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="name" class="form-control" id="name" placeholder="Enter Name"
                                        value="<?php echo e($users->name); ?>" name="name">
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
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                        value="<?php echo e($users->email); ?>" name="email">
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
                                    <input type="mobile" class="form-control" id="mobile" placeholder="Enter Mobile"
                                        value="<?php echo e($users->mobile); ?>" name="mobile">
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
                                    <label for="designation">User Type</label>

                                    <!-- <input type="text" class="form-control" id="designation"
                                        placeholder="Enter your User Type" value="<?php echo e($users->name); ?>"
                                        name="designation"> -->

                                    <select name="designation" class="form-control">
                                        <option value=""> Please Select</option>

                                        <?php $__currentLoopData = $project_manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($project_manager->id); ?>"> <?php echo $project_manager->name;?>
                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>


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
                                        placeholder="Enter your username" value="<?php echo e($users->username); ?>"
                                        name="username">
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
                            </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
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
$(document).ready(function() {

    $("#form").validate({
        rules: {
            name: {
                required: true,

            },
            email: {
                required: true,

            },
            username: {

                required: true,
            },
            mobile: {
                required: true,
            },
            designation: {

                required: true,
            },

        },
        messages: {
            name: {
                required: "*Please update your name",
            },
            email: {
                required: "*Please update a valid e-mail address",
            },
            username: {
                required: "*Please update a valid username",
            },
            mobile: {
                required: "*Please update your valid mobile no.",
            },
            designation: {
                required: "*Please update a valid designation",
            },

        }

    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>