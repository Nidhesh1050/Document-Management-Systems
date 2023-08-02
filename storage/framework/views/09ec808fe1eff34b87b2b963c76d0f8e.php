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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <a href="<?php echo e(url('admin/category')); ?>"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add User
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
    <table id="datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th> Id</th>
                <th> Parent ID </th>
                <th> Name </th>
                <th> Description</th>
                <th> Image </th>
                <th> Edit</th>
                <th> delete</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e($users->id); ?></td>
                    <td> <?php echo e($users->parent_id); ?></td>
                    <td> <?php echo e($users->name); ?></td>
                    <td> <?php echo e($users->description); ?></td>
                    <td>  <img src="<?php echo e(asset('images/' .$users->image)); ?>" style="height: 50px;width:100px;">
                    </td>
                    <td>
                        <div class="form-button-action">

                            <a href='/admin/update_category/<?php echo e($users->id); ?>'>
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                <i class="fa fa-edit">
                                </i>
                            </button>
                             </a>
                        </div>
                    </td>
                    <td>
                        <div class="form-button-action">
                            <a href="/admin/delete_category/<?php echo e($users->id); ?>" onclick="return confirm('Are you sure to delete ?')">
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




<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/category/view_category.blade.php ENDPATH**/ ?>