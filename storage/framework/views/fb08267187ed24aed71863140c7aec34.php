<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <a href="<?php echo e(url('admin/project_management')); ?>"
            class="btn btn-primary btn-round ml-auto" >
                <i class="fa fa-plus"></i>
                Add Manager
            </a>
        </div>
    </div>

    <table id="datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th> Id</th>
                <th> Project Name</th>   
                <th> Manager Id </th>
                <th> Status</th>
                <th> Edit</th>
                <th> delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e($users->id); ?></td>
                    <td> <?php echo e($users->project_name); ?></td>
                    <td> <?php echo e($users->manager_d); ?></td>
                    <td> <?php echo e($users->status); ?></td>

                    <td>
                        <div class="form-button-action">

                            <a href='/admin/update_project/<?php echo e($users->id); ?>'>
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                <i class="fa fa-edit">
                                </i>
                            </button>
                        </a>
                        </div>
                    </td>
                    <td>
                        <div class="form-button-action">
                            <a href="/admin/delete_project/<?php echo e($users->id); ?>" onclick="return confirm('Are you sure to delete ?')">
                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                        </a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
 </div>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_10\resources\views/admin/project_management/view_project.blade.php ENDPATH**/ ?>