<?php $__env->startSection('content'); ?>
<?php 
use app\Models\User;
?>
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
                    <a href="#">Document Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Document List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                            <a href="<?php echo e(url('admin/createdocument')); ?>"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Document
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
            <table id="datatables" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th> Project Name</th>
                        <th> Category Name </th>
                        <th> Document Type </th>
                        <th>Title</th>
                        <th>Description</th>
                        <th> Documents </th>
                        <th> Status</th>
                        <th> Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $status = $document->status == 1 ? 'Active' : 'InActive';
                        ?>

                        <tr>
                        <td><?php echo e($loop->iteration); ?></td>

                           
                            <td><?php echo e(User::getDocumentID($document->project_id)); ?></td>

                            <td> <?php echo e(User::getCategoryID($document->category_id)); ?></td>
                            <td> <?php echo e(User::getDocumentTypeID($document->document_type_id)); ?></td>
                            <td> <?php echo e($document->title); ?></td>
                            <td> <?php echo $document->description ?></td>
                            <td> <?php echo e($document->documents); ?></td>
                            <td><?php echo e($status); ?></td>
                            <td class="action_td">
                                <div class="form-button-action">
                                    <a href="<?php echo e(url('admin/edit_document/'.$document->id)); ?>" data-toggle="tooltip" title=""
                                            class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                            <i class="fa fa-edit">
                                            </i>
                                     
                                    </a>
                                                <?php
                                                        $status = @$document->status == 1 ? '0' : '1';
                                                        $statusicon = @$document->status == 1 ? 'btn-danger' : 'btn-success';

                                                        $statustite = @$document->status == 1 ? 'InActive' : 'Active';
                                                    ?>

                                                    <a href="<?php echo e(url('DocumentChangeStatus/' . $document->id . '/' . $status)); ?>"
                                                        onclick="return confirm('Are you sure to change status?')"
                                                        data-toggle="tooltip" title=""
                                                        class="btn-link <?php echo e($statusicon); ?>"
                                                        data-original-title="<?php echo e($statustite); ?>">
                                                        <?php if($document->status == 0): ?>
                                                            <i class="fa fa-check"></i>
                                                        <?php else: ?>
                                                            <i class="fa fa-times"></i>
                                                        <?php endif; ?>
                                                    </a>


                                    <a href="<?php echo e(url('admin/delete_document/'.$document->id)); ?>"
                                        onclick="return confirm('Are you sure you want to delete this document ?')" data-toggle="tooltip" title=""
                                            class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-trash"></i>
                                        
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\dms\resources\views/admin/document/show_document.blade.php ENDPATH**/ ?>