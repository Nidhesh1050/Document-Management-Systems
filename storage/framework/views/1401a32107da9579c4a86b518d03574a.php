<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="card">
            <div class="card-title p-3">Update Document</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <form action="<?php echo e(url('admin/update_document')); ?>" method="post" id="update" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($users->id); ?>">

                            <div>
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
                            <br>

                            <div>
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
                            <br>

                            <div>
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
                            <br>

                            <div>
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
                            <br>
                            <div class="form-group">
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
                            <br>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="" class="form-control" name="status" id="status"
                                    value="<?php echo e($users->status); ?>" placeholder="Status">
                                <span class="text-danger  ">
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
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
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
                        required: "*Update your project_id",

                    },
                    category_id: {
                        required: "*Update your valid category_id",

                    },
                    document_type_id: {
                        required: "*Update your document_type_id",
                    },
                    title: {
                        required: "*Update your title",

                    },
                    status: {
                        required: "*Update your  status",

                    },
                }

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\dms\resources\views/admin/document/edit_document.blade.php ENDPATH**/ ?>