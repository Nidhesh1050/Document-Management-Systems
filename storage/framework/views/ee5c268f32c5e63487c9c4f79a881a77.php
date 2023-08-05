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
                    <a href="#">Add Document</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Document</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('admin/add_document')); ?>" method="post" id="files"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Project Id</label>
                                    <select name="project_id" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php $__currentLoopData = $project_documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_documents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($project_documents->id); ?>">
                                            <?php echo $project_documents->project_name;?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span class="text-danger error ">
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
                                    <label>Category Id</label>
                                    <select name="category_id" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php $__currentLoopData = $category_documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_documents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category_documents->id); ?>">
                                            <?php echo $category_documents->name;?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span class="text-danger error ">
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
                                    <label>Document Type Id</label>
                                    <select name="document_ty" class="form-control">

                                        <option value=""> Please Select</option>
                                        <?php $__currentLoopData = $document_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($document_type->id); ?>"><?php echo $document_type->name?>
                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span class="text-danger error ">
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
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="title" id="" placeholder="title">
                                    <span class="text-danger error ">
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


                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlFile1"> Upload document</label>
                                    <input type="file" class="form-control-file" name="document"
                                        id="exampleFormControlFile1">
                                    <span class="text-danger error ">
                                        <?php $__errorArgs = ['document'];
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
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" name="status" id="status" value="1">
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
                            </div>
                            <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="<?php echo e(url('admin/home')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <script>
        $(document).ready(function() {



            $("#files").validate({
                rules: {
                    project_id: "required",
                    category_id: "required",
                    document_ty: "required",
                    title: "required",
                    document: "required",
                    status: "required",
                },
                messages: {
                    project_id: "Please select project name",
                    category_id: "Please select category name",
                    document_ty: "Please select document type",
                    title: "Please enter title",
                    document: "Choose any documents",
                    status: "Please enter status",
                }
            });
        });
        </script>

        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/document/createdocument.blade.php ENDPATH**/ ?>