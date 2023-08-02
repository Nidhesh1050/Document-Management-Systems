<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?php echo e(asset('admin/img/profile.jpg')); ?>" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo e(Auth::user()->name); ?>

                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/home')); ?>">
                        <i class="fas fa-layer-group"></i>
                        <p>Dashboard</p>
                    </a>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-users"></i>
                        <p>User Management</p>
						<span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('admin/user-list')); ?>">
                                    <span class="sub-item">User List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/adduser')); ?>">
                                    <span class="sub-item">Add User</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Category Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('admin/view_category')); ?>">
                                    <span class="sub-item">Category List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/category')); ?>">
                                    <span class="sub-item">Add Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#project">
                        <i class="fas fa-laptop-code"></i>
                        <p>Project Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="project">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('admin/view_project')); ?>">
                                    <span class="sub-item">Project List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/project_management')); ?>">
                                    <span class="sub-item">Add Project</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Document Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('admin/document')); ?>">
                                    <span class="sub-item">View Document</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/document')); ?>">
                                        <span class="sub-item">Add Document</span>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#list">
                        <i class="fas fa-list"></i>
                        <p>Document Type</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="list">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('admin/view_document')); ?>">
                                    <span class="sub-item">Document List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/add_document')); ?>">
                                    <span class="sub-item">Add Document</span>
                                </a>
                            </li>
                        </ul>
                    </div>
				</li>

            </ul>
        </div>
    </div>
</div>

<?php /**PATH C:\wamp64\www\dms\resources\views/elements/admin/left_menus.blade.php ENDPATH**/ ?>