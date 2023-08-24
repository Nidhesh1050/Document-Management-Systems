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
                <a href="<?php echo e(url('admin/view_project')); ?>">Project Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Project</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
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
                        <div class="card-title">Edit Project</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(url('admin/edit_project')); ?>" method="post" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($projects->id); ?>">


                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control" name="project_name" id="project_name"
                                    value="<?php echo e($projects->project_name); ?>" placeholder="name">

                                    <span class="text-danger error " id="project_err">
                                            <?php $__errorArgs = ['project_name'];
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
                                <label for="name">Project Manager</label>
                                <select name="manager_d" class="form-control">
                                        <option value=""> Please Select</option>
                                        <?php foreach($managers as $manager){?>
                                        <option <?php if($manager->id == $projects->manager_d){?>selected <?php } ?> value="<?php echo e($manager->id); ?>"><?php echo e($manager->name); ?></option>
                                        <?php }?>
                                    </select>


                                
                            </div>
                            <div class="form-group col-md-12">
                                        <label for="description"> Project Description</label>
                                        <textarea class="form-control" name="description" id="editor" placeholder="write text" rows="2">
                                        <?php echo e($projects->description); ?>

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
                                <button type="submit" class="mt-4 btn btn-success">Update</button>
                                <a href="<?php echo e(url('admin/view_project')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });



        $("#project_name").blur(function(){
        // alert('aaaa');
        var project_name = $(this).val();
        id = <?php echo $projects->id ?>;
        console.log(id);
        $.ajax({
            type: "GET",
            url: "/admin/checkProject",
            data: {'project_name':project_name,'id':id},
            success: function(response) 
            { 
                console.log(response);
                if(response == 1){
                $('#project_err').text('This project is already exist');
                $('#submit').attr('disabled','disabled');
                }
                else{
                $('#project_err').text('');
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
<?php echo $__env->make('layouts.admin-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/admin/project_management/update_project.blade.php ENDPATH**/ ?>