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
                            <a href="<?php echo e(url('admin/adduser')); ?>"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
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
                                        <th> Name</th>
                                        <th> Email </th>
                                        <th> Mobile </th>
                                        <th> Designation</th>
                                        <th> Username </th>
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
                                            <td> <?php echo e($users->name); ?></td>
                                            <td> <?php echo e($users->email); ?></td>
                                            <td> <?php echo e($users->mobile); ?></td>
                                            <td> <?php echo e($users->designation); ?></td>
                                            <td> <?php echo e($users->username); ?></td>
                                            <td><?php echo e($status); ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href='edit/<?php echo e($users->id); ?>'>
                                                        <button type="button" data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                            <i class="fa fa-edit">
                                                            </i>
                                                        </button>
                                                    </a>
                                                    <a href="delete/<?php echo e($users->id); ?>"
                                                        onclick="return confirm('Are you sure to delete ?')">
                                                        <button type="button" data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger" data-original-title="Remove">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/user/userManagement.blade.php ENDPATH**/ ?>