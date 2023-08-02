<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="card">
        <div class="card-title p-3">Project Management</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <form action="<?php echo e(url('admin/add_project')); ?>" method="post" id="category"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>


                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input type="text" class="form-control" name="project_name" id="" placeholder="name">
                            <span class="text-danger error ">
                                <?php $__errorArgs = ['project_name'];
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


                        <div class="form-group">
                        <label>Manager Name</label>
                        <select name="manager_d" class="form-control">
                        <?php $__currentLoopData = $project_manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($project_manager->id); ?>"> <?php echo $project_manager->name;?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger error ">
                                <?php $__errorArgs = ['manager_d'];
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

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="" class="form-control" name="status" id="status"
                                placeholder="Status">
                                <span class="text-danger error ">
                                <?php $__errorArgs = ['status'];
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

                            <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $("#category").validate({
        rules: {
            project_name: "required",
            manager_d: "required",
            status: "required",

        },
        messages: {
            project_name: "Please enter your Project Name",
            manager_d: "Please select manager_d",
            status: "Please select Status",
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_10\resources\views/admin/project_management/project.blade.php ENDPATH**/ ?>