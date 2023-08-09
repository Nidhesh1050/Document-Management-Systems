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
                    <a href="#"> Project List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                <div class="flash-message">
                        <?php if($message = Session::get('success')): ?>
                                    <div class="alert alert-success">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                    <?php endif; ?>  
                        <?php if($message = Session::get('error')): ?>
                                    <div class="alert alert-danger">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                    <?php endif; ?>  
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="<?php echo e(url('admin/project_management')); ?>"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Project
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

    <table id="datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th> S.NO</th>
                <th> Project Name</th>
                <th> Project Description</th>      
                <th> Manager Name </th>
                <th> Status</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                     $status = $users->status == 1 ? 'Active' : 'InActive';
                                        ?>
                <tr>
                <td><?php echo e($loop->iteration); ?></td>
                    <td> <?php echo e($users->project_name); ?></td>
                    <td> <?php echo e($users->description); ?></td>
                    <td> <?php echo e($users->name); ?></td>
                    <td> <?php echo e($status); ?></td>

                    <td>
                        <div class="form-button-action">

                            <a href='/admin/update_project/<?php echo e($users->id); ?>'>
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                <i class="fa fa-edit">
                                </i>
                            </button>
                        </a>
                        </div>
                   
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




<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dms\resources\views/admin/project_management/view_project.blade.php ENDPATH**/ ?>