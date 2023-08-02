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
                    <a href="#">Document Type</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Update Document Type </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Document</div>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo e(url('admin/update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($users->id); ?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" class="form-control"
                                placeholder="Enter Name" name="name" value="<?php echo e($users->name); ?>">                             
                            </div>                        
                            <div class="text-right">
                                <button type="update" class="mt-4 btn btn-success">Update</button>
                                <a href="<?php echo e(url('admin/home')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                            <div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>        
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/document/edit.blade.php ENDPATH**/ ?>