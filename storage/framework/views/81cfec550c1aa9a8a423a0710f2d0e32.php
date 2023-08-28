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
                    <a href="<?php echo e(url('company/documentType_view')); ?>">Document Type</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Document Type </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Document Type</div>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo e(url('company/documentType_update')); ?>" method="post" id="validateform">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($documentTypes->id); ?>">
                            <div class="form-group">
                                <label for="name">Document Type</label>
                                <input type="name" class="form-control" placeholder="Enter Name" name="name"
                                    value="<?php echo e($documentTypes->name); ?>" id="name">
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
                                    <span>
                            </div>
                            <div class="text-right">
                                <button type="update" class="mt-4 btn btn-success">Update</button>
                                <a href="<?php echo e(url('company/documentType_view')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function(){
        $("#validateform").validate({
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
        id = <?php echo $documentTypes->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/company/checkDocumentType",
            data: {'name':name,'id':id},
            success: function(response) 
            { 
                console.log(response);
                if(response == 1){
                $('#name_err').text('This company is already exist');
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
<?php echo $__env->make('layouts.company-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\dms\resources\views/company/document_type/documentType_edit.blade.php ENDPATH**/ ?>