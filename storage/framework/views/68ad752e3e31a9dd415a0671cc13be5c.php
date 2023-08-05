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
                    <a href="#">Notification Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Update Notification </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Notification</div>
                    </div>
                    <div class="card-body">   
        <form action="<?php echo e(url('admin/update_notification')); ?>" id="form" method="POST">
            <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($users->id); ?>">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo e($users->title); ?>" class="form-control" >
                    <span class="text-danger error ">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="textarea" name="description" value="<?php echo e($users->description); ?>" class="form-control" >
                    <span class="text-danger error ">
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <span>
                </div>
              
                <div class="text-right">
                         <button type="submit" class="mt-4 btn btn-success">Submit</button>
                         <a href="<?php echo e(url('admin/home')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                <div>
        </form>
    </div>   
</div>

<script>
        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    title: "required",
                    description: "required",
                },
                messages: {
                    title: "Please enter title.",
                    description: "Please enter description.",
                }
            });
        });
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/notification/edit_notification.blade.php ENDPATH**/ ?>