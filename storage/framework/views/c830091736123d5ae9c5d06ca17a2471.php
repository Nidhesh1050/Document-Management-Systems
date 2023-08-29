<?php
$currentURL =Route::current()->uri;
?>

<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">

                <div class="avatar-sm float-left mr-2">
                    <?php if($logo->profile){?>
                        <img src="<?php echo e(asset('images/profile/' .$logo->profile)); ?>" alt="..." class="avatar-img rounded-circle" >
                    <?php }else{?>
                        <img src="<?php echo e(asset('images/profiles/demo-profile.png')); ?>" alt="..." class="avatar-img rounded-circle" >
                    <?php }?>
                </div>


                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo e(Auth::user()->name); ?>

                            <span class="user-level">Company Name</span>
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
                            </li>ile
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
                <li class="nav-item"  >
                    <a href="<?php echo e(url('company/home')); ?>">
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
                            <li class="sidebar-item">
                                <a <?php if($currentURL =='company/userManagement' || $currentURL =='company/edit/{id}'){ echo 'active'; }?> class="sidebar-link" href="<?php echo e(url('company/userManagement')); ?>">
                                    <span class="sub-item">User List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('company/adduser')); ?>">
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
                                <a href="<?php echo e(url('company/view_category')); ?>">
                                    <span class="sub-item">Category List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('company/category')); ?>">
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
                                <a href="<?php echo e(url('company/view_project')); ?>">
                                    <span class="sub-item">Project List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('company/project')); ?>">
                                    <span class="sub-item">Add Project</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item <?php if($currentURL =='company/document' || $currentURL =='company/createdocument'|| $currentURL =='company/edit_document/{id}'){ echo 'active'; }?>">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-file"></i>
                        <p>Document Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/document','company/createdocument','company/edit_document/{id}'])){ echo 'show';}?>" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('company/document')); ?>">
                                    <span class="sub-item">View Document</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('company/createdocument')); ?>">
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
                             <!-- <a href="<?php echo e(url('company/view_document')); ?>"> -->
                                <a href="<?php echo e(url('company/documentType_view')); ?>">
                                    <span class="sub-item">Document List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('company/documentType_add')); ?>">
                                    <span class="sub-item">Add Document</span>
                                </a>
                            </li>
                        </ul>
                    </div>
				</li>

               
                <li class="nav-item <?php if($currentURL =='company/logos' || $currentURL =='company/update_logo'){ echo 'active'; }?>">
                    <a data-toggle="collapse" href="#setting">
                        <i class="fas fa-cog"></i>
                        <p>Setting Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php if(in_array($currentURL,['company/logos','company/update_logo/{id}'])){ echo 'show';}?>" id="setting">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('comapny/logos')); ?>">
                                        <span class="sub-item">Logo & profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item <?php if($currentURL =='company/show_notification' || $currentURL =='company/notification'|| $currentURL =='company/edit_notification/{id}'){ echo 'active'; }?>">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-bullhorn"></i>
								<p>Notification</p>
								<span class="caret"></span>
							</a>
							<div class="collapse <?php if(in_array($currentURL,['company/show_notification','company/notification','company/edit_notification/{id}'])){ echo 'show';}?>" id="tables">
								<ul class="nav nav-collapse">
									<li>
                                    <a href="<?php echo e(url('company/show_notification')); ?>">
											<span class="sub-item">View Notification</span>
										</a>
									</li>
									<li>
                                    <a href="<?php echo e(url('company/notification')); ?>">
											<span class="sub-item">Add Notification</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                        <li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>CMS</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo e(url('company/view_content')); ?>">
											<span class="sub-item">View CMS</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(url('company/addcontent')); ?>">
											<span class="sub-item">Add CMS</span>
										</a>
									</li>
								</ul>
							</div>
						</li>


                        <li class="nav-item">
							<a data-toggle="collapse" href="#email">
								<i class="fas fa-table"></i>
								<p>Email Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="email">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo e(url('company/show_email')); ?>">
											<span class="sub-item">Email Types</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(url('company/email')); ?>">
											<span class="sub-item">Add Email Type</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(url('company/show_content')); ?>">
											<span class="sub-item"> Email Content</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(url('company/content')); ?>">
											<span class="sub-item">Add Email Content</span>
										</a>
									</li>
								</ul>
							</div>
						</li>


                        <li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-key"></i>
								<p>Permission</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo e(url('company/module_permission')); ?>">
											<span class="sub-item">Module Permission</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

            </ul>
        </div>
    </div>
</div>

<?php /**PATH C:\wamp64\www\dms\resources\views/elements/company/left_menus.blade.php ENDPATH**/ ?>