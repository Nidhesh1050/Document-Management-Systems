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
                        <a href="#"> Document List</a>
                    </li>
                </ul>
            </div>
            
                <div class="card-header">
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
                    <a href="<?php echo e(url('admin/add_document')); ?>"><button class="btn btn-primary btn-round ml-auto"
                            data-toggle="modal" data-target="">
                            <i class="fa fa-plus"></i>
                            Add Document Type
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th> Document Type Name</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $status = "";
                                    $status = $users->status == 1 ? 'Active' : 'InActive';
                                ?>
                                <tr>
                                    <td><?php echo e($users->name); ?></td>
                                    <td><?php echo e($status); ?></td>
                                    
                                    <td>
                                        <div class="form-button-action">
                                            <a href="edit/<?php echo e($users->id); ?>">
                                                <button type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                </button>
                                            </a>
                                            <a href="deletedocument/<?php echo e($users->id); ?>"
                                                onclick="return confirm('Are you sure you want to delete this document type ?')">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/document/view_document.blade.php ENDPATH**/ ?>