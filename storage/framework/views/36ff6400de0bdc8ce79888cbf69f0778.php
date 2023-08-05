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
                        <a href="#">Category Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Category</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Category</div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(url('admin/edit_category')); ?>" id="category_edit" method="post" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($users->id); ?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Parent ID</label>
                                        <select name="parent_id" class="form-control">
                                            <option value=""> Please Select</option>
                                            <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($parent->id); ?>"
                                                    <?php if($parent->id == $users->parent_id): ?> echo 'selected="selected"'; <?php endif; ?>>
                                                    <?php echo e($parent->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="<?php echo e($users->name); ?>" id="name" placeholder="name">
                                            <span class="text-danger error ">
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" placeholder="write text" rows="2">
                                            <?php echo e($users->description); ?></textarea>
                                            <span class="text-danger error ">
                                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                    </div>
                                    
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Update</button>
                                    <a href="<?php echo e(url('admin/home')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>


                                    </div>
                                    <form>


                                </div>
                            <script>
                                $(document).ready(function() {

                                    $("#category_edit").validate({
                                        rules: {
                                            parent_id: "required",
                                            name: "required",
                                            description: "required",
                                            image: "required",
                                            status: "required",
                                        },
                                        messages: {
                                            parent_id: "Update  parent_id",
                                            name: "Update  Name",
                                            description: "Update   description",
                                            image: "Choose image",
                                            status: "Update  Status",

                                        }

                                    });
                                });
                            </script>
                            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/category/update_category.blade.php ENDPATH**/ ?>