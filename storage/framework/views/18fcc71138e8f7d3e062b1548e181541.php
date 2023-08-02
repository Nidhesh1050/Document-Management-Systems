<?php $__env->startSection('content'); ?>
    
<div class="content">
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4">
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
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


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


<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel_10\resources\views/admin/document/add_document.blade.php ENDPATH**/ ?>