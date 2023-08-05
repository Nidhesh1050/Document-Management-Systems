
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
                    <a href="#">Email Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">  Add Email_Content</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <a href="<?php echo e(url('admin/content')); ?>"><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Email_Content
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="datatables" class="display table table-striped table-hover" >
		    <thead>
				<tr>
					<!-- <th>id</th> -->
                    <th>S.No.</th>
					<th>Email_Type</th>
                    <th>Subject</th>
                    <th>Message</th>													
					<th>Action</th>
				</tr>
		    </thead>
			
		 <tbody>
             <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
                    <!-- <td><?php echo e($user->id); ?></td> -->
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($user->email_type); ?></td>
					
                    <td><?php echo e($user->subject); ?></td>
                    <td><?php echo e($user->message); ?></td>
                    
					<td>
					   <div class="form-button-action">
                            <a href="edit_content/<?php echo e($user->id); ?>"> 
									<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
										<i class="fa fa-edit"></i>
									</button>
                            </a>

                            <a href='delete/<?php echo e($user->id); ?>'> 
									<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete">
										<i class="fa fa-times"></i>
									</button>
                            </a>
						</div>
					</td>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
	         </tbody>
	    </table>
 </div>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/email_management/show_content.blade.php ENDPATH**/ ?>