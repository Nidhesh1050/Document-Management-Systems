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
                    <a href="<?php echo e(url('admin/view_content')); ?>">Content Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Content</a>
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
                            <a href="<?php echo e(url('admin/addcontent')); ?>"><button class="btn btn-primary btn-round ml-auto"
                                    data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Content
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
                                        <th> Title</th>
                                        <th> Description</th>
                                        <th> Image </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                        <!-- <th> Delete </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $cms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $status = $cms->status == 1 ? 'Active' : 'InActive';
                                    ?>

                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td> <?php echo e($cms->title); ?></td>
                                        <td> <?php echo $cms->description ?></td>
                                        <td> <img src="<?php echo e(asset('cms/' . $cms->image)); ?>"
                                                style="height: 50px;width:100px;">
                                        </td>
                                        <td> <?php echo e($status); ?></td>
                                        <td>
                                            <div class="form-button-action">

                                                <a href="<?php echo e(url('/admin/update_content/' . $cms->id)); ?>"
                                                    data-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                            </div>
                                                <?php
                                                $status = @$cms->status == 1 ? '0' : '1';
                                                $statusicon = @$cms->status == 1 ? 'btn-danger' : 'btn-success';

                                                $statustite = @$cms->status == 1 ? 'InActive' : 'Active';
                                                ?>

                                                <div class="form-button-action">
                                                    <a href="<?php echo e(url('/CMSChangeStatus/'. $cms->id.'/'. $status)); ?>"
                                                        onclick="return confirm('Are you sure to change status?')"
                                                        data-toggle="tooltip" title="" class="btn-link <?php echo e($statusicon); ?>"
                                                        data-original-title="<?php echo e($statustite); ?>">
                                                        <?php if($cms->status==0): ?>
                                                        <i class="fa fa-check"></i>
                                                        <?php else: ?>
                                                        <i class="fa fa-times"></i>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>

                                                <a href="<?php echo e(url('/admin/delete_content/' .  $cms->id)); ?>"
                                                    onclick="return confirm('Are you sure you want to delete this content ?')"
                                                    data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                                    data-original-title="Remove">
                                                    <i class="fa fa-trash"></i>
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
                    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/content_management/view_content.blade.php ENDPATH**/ ?>