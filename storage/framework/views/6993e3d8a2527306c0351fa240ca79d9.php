<?php $__env->startSection('content'); ?>
    <div class="content">

        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?php echo e(url('company/home')); ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('company/show_email')); ?>">Email Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Email Type</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Email Type</div>
                        </div>
                        <div class="card-body">
                            <form action="add_email" id="form" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label>Email Type</label>
                                    <input type="text" name="email_type" id="email_type" class="form-control">
                                    <span class="text-danger  ">
                                        <?php $__errorArgs = ['email_type'];
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
                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                    <a href="<?php echo e(url('company/show_email')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                            </form>


                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#form").validate({
                                    rules: {

                                        email_type: "required",


                                    },
                                    messages: {

                                        email_type: "*Update  email type",
                                    }

                                });
                            });
                        </script>
                    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/company/email_management/email.blade.php ENDPATH**/ ?>