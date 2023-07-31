<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content">
            <div class="col-md-6 col-lg-4">
                <form action="<?php echo e(url('admin/update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($users->id); ?>">
                    <div>
                        <h2>Edit User</h2>
                    </div>
                    <br>
                    <!--Input elemets for form-->
                    <div>
                        <label><b>Name</b></label>
                        <input type="text" placeholder="Enter your first name" name="name" value="<?php echo e($users->name); ?>"
                            class="form-control">
                    </div>
                    <div>
                        <label><b>E-mail</b></label>
                        <input type="email" placeholder="Enter your e-mail" name="email" value="<?php echo e($users->email); ?>"
                            class="form-control">
                    </div>
                    <div>
                        <label><b>Mobile No.</b></label>
                        <input type="tel" placeholder="Enter your mobile no."name="mobile" value="<?php echo e($users->mobile); ?>"
                            class="form-control">
                    </div>
                    <div>
                        <label><b>Designation</b></label>
                        <input type="text" placeholder="Enter your Designation" name="designation"
                            value="<?php echo e($users->designation); ?>" class="form-control">
                    </div>
                    <div>
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter your Username" name="username"
                            value="<?php echo e($users->username); ?>" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_10\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>