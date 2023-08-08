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
            <a href="<?php echo e(url('admin/add_document')); ?>"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                    data-target="">
                    <i class="fa fa-plus"></i>
                        Add Document Type
                </button>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/document/view_document.blade.php ENDPATH**/ ?>