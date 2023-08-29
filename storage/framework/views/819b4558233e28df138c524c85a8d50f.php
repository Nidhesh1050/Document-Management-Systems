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
                    <a href="<?php echo e(url('company/view_category')); ?>">Category Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Category</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
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


                        <div class="card-title">Add Category</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('company/add_category')); ?>" method="post" id="category"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Parent Name</label>
                                    <select name="parent_id" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($parent->id); ?>"><?php echo e($parent->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">

                                    <span class="text-danger error " id="name_err">
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

                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="editor"
                                        placeholder="write text" rows="2">
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

                                <div class="text-right">
                                    <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                    <a href="<?php echo e(url('company/view_category')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                    <div>
                        </form>
                    </div>
                </div>

            </div>

            <script>
            $(document).ready(function() {



                $("#category").validate({
                    rules: {
                        parent_id: "required",
                        name: "required",
                        // description: "required",
                        image: "required",
                        status: "required",
                    },
                    messages: {
                        parent_id: "Please select parent name",
                        name: "Please enter your Name",
                        // description: "Please enter  description",
                        image: "Chose any image",
                        status: "Please enter status",

                    }


                });
            });



            $("#name").blur(function() {
                var name = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/company/checkName?name=" + name,
                    success: function(response) {
                        console.log(response);
                        if (response == 1) {
                            $('#name_err').text('This Name is already exist');
                            $('#submit').attr('disabled', 'disabled');
                        } else {
                            $('#name_err').text('');
                            $('#submit').removeAttr('disabled');
                        }
                    },
                    error: function(response) {

                    }
                });
            });
            </script>
            <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
            </script>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.company-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\dms\resources\views/company/category/category.blade.php ENDPATH**/ ?>