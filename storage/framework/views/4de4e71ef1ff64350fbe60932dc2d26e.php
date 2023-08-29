<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?php echo e(url('company/home')); ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Email Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Email Type</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
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
                            <a href="<?php echo e(url('company/email')); ?>"><button class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Email Type
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
                                        <th>Email_Type</th>
                                        <th> Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $emailTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emailType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $status = "";
                                    $status = $emailType->status == 1 ? 'Active' : 'InActive';
                                    ?>
                                        <tr>
                                          
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($emailType->email_type); ?></td>
                                            <td><?php echo e($status); ?></td>
                                           
                            <td class="action_td">
                                
                           

                                    <a href="<?php echo e(url('company/edit_email/'. $emailType->id)); ?>" data-toggle="tooltip"
                                        title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit">
                                        </i>
                                    </a>

                                    <?php
                                    $status = @$emailType->status == 1 ? '0' : '1';
                                    $statusicon = @$emailType->status == 1 ? 'btn-danger' : 'btn-success';

                                    $statustite = @$emailType->status == 1 ? 'InActive' : 'Active';
                                    ?>

                                    <a href="<?php echo e(url('/company/EmailTypeChangeStatus/'. $emailType->id.'/'. $status)); ?>"
                                        onclick="return confirm('Are you sure to change status?')" data-toggle="tooltip"
                                        title="" class="btn-link <?php echo e($statusicon); ?>" data-original-title="<?php echo e($statustite); ?>">
                                        <?php if($emailType->status==0): ?>
                                        <i class="fa fa-check"></i>
                                        <?php else: ?>
                                        <i class="fa fa-times"></i>
                                        <?php endif; ?>
                                    </a>



                                    <a href="<?php echo e(url('company/emaildelete/'. $emailType->id)); ?>"
                                        onclick="return confirm('Are you sure you want to delete this document type ?')"
                                        data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                        data-original-title="Remove">
                                        <i class="fa fa-trash"></i>

                                    </a>

                                    </td>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/company/email_management/show_email.blade.php ENDPATH**/ ?>