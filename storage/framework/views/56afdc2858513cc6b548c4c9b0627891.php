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
                    <a href="#">Project Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Update Manager</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Manager</div>
                    </div>
                    <div class="card-body">
                            <form action="<?php echo e(url('admin/edit_project')); ?>" method="post" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($users->id); ?>">


                                <div class="form-group">
                                    <label for="name">Project Name</label>
                                    <input type="text" class="form-control" name="project_name" value="<?php echo e($users->project_name); ?>"
                                        placeholder="name">
                                </div>


                                <div class="form-group">
                                    <label for="name">Project Manager</label>
                                    <select name="manager_d" class="form-control">
                                        <option value=""> Please Select</option>
                                    <?php $__currentLoopData = $project_manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($users->id); ?>"><?php echo e($users->manager_d); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>


                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="" class="form-control" value="<?php echo e($users->status); ?>" name="status"
                                        id="status" placeholder="Status">
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
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/project_management/update_project.blade.php ENDPATH**/ ?>