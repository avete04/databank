<?php if(Auth::user()->user_level == 1): ?>
    <div class="main-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Employees</span>
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a class="<?php echo e(Request::is('departments') ? 'active' : ''); ?>" href="<?php echo e(url('departments')); ?>">Departments</a>
                            </li>

                            <li>
                                <a class="<?php echo e(Request::is('designations') ? 'active' : ''); ?>" href="<?php echo e(url('designations')); ?>">Designations</a>
                            </li>

                            <li>
                                <a class="<?php echo e(Request::is('employees') ? 'active' : ''); ?>" href="<?php echo e(url('employees')); ?>">All Employees</a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-title">
                        <span>Performance</span>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                     
                            <li>
                                <a class="<?php echo e(Request::is('performance-appraisal') ? 'active' : ''); ?>" href="<?php echo e(url('performance-appraisal')); ?>"> Performance Appraisal </a>
                            </li>

                        </ul>
                    </li>

                    <li class="<?php echo e(Request::is('promotion') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('promotion')); ?>"><i class="la la-bullhorn"></i> <span>Promotion</span> </a>
                    </li>

                    <li class="<?php echo e(Request::is('resignation') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('resignation')); ?>"><i class="la la-external-link-square"></i> <span>Resignation</span> </a>
                    </li>

                    <li class="<?php echo e(Request::is('termination') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('termination')); ?>"><i class="la la-external-link-square"></i> <span>Termination</span> </a>
                    </li>

                    <li class="<?php echo e(Request::is('users') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('users')); ?>"><i class="la la-user-plus"></i><span>Users</span> </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>


<?php if(Auth::user()->user_level == 2): ?>
    <div class="main-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Employees</span>
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employee</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a href="">Profile</a>
                            </li>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/databank/resources/views/layout/partials/nav.blade.php ENDPATH**/ ?>