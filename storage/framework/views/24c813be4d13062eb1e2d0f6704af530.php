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
                    <a href="<?php echo e(url('company/view_project')); ?>">Project Management</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('company/project_management')); ?>">Add Project</a>
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
                            <div class="card-title">Add Project</div>
                        </div>

                        <div class="card-body">
                            <form action="<?php echo e(url('company/add_project')); ?>" method="post" id="category"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Project</label>
                                        <input type="text" class="form-control" name="project_name" id="project_name"
                                            placeholder="Name">
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
                                    <div class="form-group col-md-6">
                                        <label>Manager</label>
                                        <select name="manager_d" class="form-control">
                                            <option value=""> Please Select</option>
                                            <?php $__currentLoopData = $project_manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($project_manager->id); ?>">
                                                <?php echo $project_manager->name;?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="text-danger error ">
                                            <?php $__errorArgs = ['manager_d'];
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
                                            placeholder="Write text" rows="2">
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
                                        <a href="<?php echo e(url('company/view_project')); ?>" class="mt-4 btn btn-danger">Cancel</a>
                                        <div>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            $("#category").validate({
                rules: {
                    project_name: "required",
                    manager_d: "required",


                },
                messages: {
                    project_name: "Please enter your project",
                    manager_d: "Please select manager",

                }
            });
        });
      
        
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

            


 $("#project_name").blur(function(){

    var project_name = $(this).val();
    $.ajax({
      type: "GET",
      url: "/company/checkProject?project_name="+project_name,
      
      success: function(response) 
      { 
        console.log(response);
        if(response == 1){
          $('#project_err').text('This project name is already exist');
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

<?php echo $__env->make('layouts.company-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dms\resources\views/company/project_management/project.blade.php ENDPATH**/ ?>