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
                    <a href="#">Document Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Document</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Document </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('admin/update_document')); ?>" method="post" id="update" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($users->id); ?>">
                            <div class="form-row">
                               <div class="form-group col-md-6">
                                <label><b>Project Id</b></label>
                                <input type="text" name="project_id" id="project_id" value="<?php echo e($users->project_id); ?>"
                                    class="form-control">
                                <span class="text-danger  ">
                                    <?php $__errorArgs = ['project_id'];
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



                            <div class="form-group col-md-6">
                                <label><b>Category Id</b></label>
                                <input type="text" name="category_id" id="category_id" value="<?php echo e($users->category_id); ?>"
                                    class="form-control">
                                <span class="text-danger  ">
                                    <?php $__errorArgs = ['category_id'];
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



                            <div class="form-group col-md-6">
                                <label><b>Document Type Id</b></label>
                                <input type="text" name="document_type_id" id="document_type_id"
                                    value="<?php echo e($users->document_type_id); ?>" class="form-control">
                                <span class="text-danger  ">
                                    <?php $__errorArgs = ['document_type_id'];
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



                            <div class="form-group col-md-6">
                                <label><b>Title</b></label>
                                <input type="text" name="title" id="title" value="<?php echo e($users->title); ?>"
                                    class="form-control">
                                <span class="text-danger  ">
                                    <?php $__errorArgs = ['title'];
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
                                <label for="exampleFormControlFile1"> Upload document</label>
                                <input type="file" class="form-control-file" name="documents" id="documents"
                                    value="<?php echo e($users->documents); ?>">
                                    <span><?php echo e($users->documents); ?></span>
                                <span class="text-danger  ">
                                    <?php $__errorArgs = ['documents'];
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

                        </form>
</div>
                    </div>

    <script>
        $(document).ready(function() {
            // validate  form using jquey
            $("#update").validate({
                rules: {
                    project_id: {
                        required: true,

                    },
                    category_id: {
                        required: true,

                    },
                    document_type_id: {

                        required: true,
                    },
                    title: {
                        required: true,

                    },
                    status: {

                        required: true,
                    },
                },
                messages: {
                    project_id: {
                        required: "*Update  project_id",

                    },
                    category_id: {
                        required: "*Update  valid category_id",

                    },
                    document_type_id: {
                        required: "*Update  document_type_id",
                    },
                    title: {
                        required: "*Update  title",

                    },


                }

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/document/edit_document.blade.php ENDPATH**/ ?>