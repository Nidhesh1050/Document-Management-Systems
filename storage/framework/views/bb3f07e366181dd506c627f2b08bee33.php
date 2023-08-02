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
                    <form action="<?php echo e(url('admin/register')); ?>" method="post" id="validate">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <h1>Add Document Name</h1>
                            <label for="name">Name</label>
                            <input type="name" class="form-control"
                                placeholder="Enter Name" name="name">
                                <span class="text-danger  ">
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
                        
                        <div class="text-right">
                                <button type="submit" class="mt-4 btn btn-success">Submit</button>
                                <a href="<?php echo e(url('admin/home')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                            <div>                    </form>


                </div>
            </div>
        </div>
    </div>
        
</div>

<script>
   $(document).ready(function(){
    // validate  form using jquey
        $("#validate").validate({
            rules: {
                name: {
                    required:true,
                    minlength:4,
                    maxlength:20,
                },
               
            },
            messages: {
                name: {
                    required:"*Please enter your Name",
                },
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/document/add_document.blade.php ENDPATH**/ ?>