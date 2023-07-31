

<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="card">
        <div class="card-title p-3">Category Form</div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <form action="<?php echo e(url('admin/add_category')); ?>" method="post" id="category"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Parent Id</label>
                        <select name="parent_id" class="form-control">
                            <option value=""> Please Select</option>
                            <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($parent->id); ?>"><?php echo e($parent->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="name">
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

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="comment"
                                placeholder="write text" rows="5">
                                            </textarea>
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

                        <div class="form-group">
                            <label for="exampleFormControlFile1"> Image</label>
                            <input type="file" class="form-control-file" name="image"
                                id="exampleFormControlFile1">
                            <span class="text-danger error ">
                                <?php $__errorArgs = ['image'];
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
            parent_id: "required",
            name: "required",
            description: "required",
            image: "required",
            status: "required",
        },
        messages: {
            parent_id: "Please select parent_id",
            name: "Please enter your Name",
            description: "Please enter  description",
            image: "Chose any image",
            status: "Please enter Status",

        }


    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_10\resources\views/admin/category/category.blade.php ENDPATH**/ ?>