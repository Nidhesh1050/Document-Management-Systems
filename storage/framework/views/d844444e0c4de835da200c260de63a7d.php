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
                    <a href="#">Content Management</a>
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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Content</div>
                    </div>
                    <div class="card-body">
                 
             <form action="<?php echo e(url('admin/add_content')); ?>" method="post" id="content"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="title">
                             <span class="text-danger error">
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
                        <div class="form-group col-md-6"></div>

                         <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control"  name="description" id="editor"
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

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" name="image"
                                id="image">
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
                          <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <input type="checkbox"  name="status" id="status" value="1"
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
                        
                        <div class="text-right">
                             <button type="submit" class="mt-4 btn btn-success">Submit</button>
                             <a href="<?php echo e(url('admin/home')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                    
                        </form>
                    </div>

                </div>
            </div>
        </div>  
    </div>
</div>

<script>
$(document).ready(function() {
    $("#content").validate({
        rules: {
            
            title: "required",
            description: "required",
            image: "required",
            status: "required",
        },
        messages: {
           
            title: "*Please enter your title",
            description: "*Please enter  description",
            image: "*Choose any image",
            status: "*Please enter status",

        }

    });
});
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/content_management/addcontent.blade.php ENDPATH**/ ?>