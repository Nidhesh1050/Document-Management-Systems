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
                    <a href="<?php echo e(url('admin/documentType_view')); ?>">Document Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Document Type</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">

                        <div class="card-title">Add Document Type</div>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo e(url('admin/documentType_add')); ?>" method="post" id="validate">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name">Document Type </label>
                            <input type="text" class="form-control"
                                placeholder="Enter document type" name="name" id="name">
                                <span class="text-danger error" id="name_err">
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
                                <a href="<?php echo e(url('admin/documentType_view')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                            <div>
                      </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
   $(document).ready(function(){
        $("#validate").validate({
            rules: {
                name: {
                    required:true,
                
                },

            },
            messages: {
                name: {
                    required:"Please enter document type",
                },
            }
        });
    });

    $("#name").blur(function(){
   // alert('aaaa');
    var name = $(this).val();
   
    $.ajax({
      type: "GET",
      url: "/admin/checkDocumentType?name="+name,
  
      
      success: function(response) 
      { 
        console.log(response);
        if(response == 1){
          $('#name_err').text('This name is already exist');
          $('#submit').attr('disabled','disabled');
        }
        else{
          $('#name_err').text('');
          $('#submit').removeAttr('disabled');
        }
      },
      error: function(response) 
      {
        
      }
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\dms\resources\views/admin/document_type/documentType_add.blade.php ENDPATH**/ ?>