@if(Auth::user()->user_level == 1)
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
                                <a class="{{ Request::is('employees') ? 'active' : '' }}" href="{{ url('employees') }}">All Employees</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('departments') ? 'active' : '' }}" href="{{ url('departments') }}">Departments</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('designations') ? 'active' : '' }}" href="{{ url('designations') }}">Designations</a>
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
                                <a class="{{ Request::is('performance-appraisal') ? 'active' : '' }}" href="{{ url('performance-appraisal') }}"> Performance Appraisal </a>
                            </li>

                        </ul>
                    </li>

                    <li class="{{ Request::is('promotion') ? 'active' : '' }}">
                        <a href="{{ url('promotion') }}"><i class="la la-bullhorn"></i> <span>Promotion</span> </a>
                    </li>

                    <li class="{{ Request::is('resignation') ? 'active' : '' }}">
                        <a href="{{ url('resignation') }}"><i class="la la-external-link-square"></i> <span>Resignation</span> </a>
                    </li>

                    <li class="{{ Request::is('termination') ? 'active' : '' }}">
                        <a href="{{ url('termination') }}"><i class="la la-external-link-square"></i> <span>Termination</span> </a>
                    </li>

                    <li class="{{ Request::is('users') ? 'active' : '' }}">
                        <a href="{{ url('users') }}"><i class="la la-user-plus"></i><span>Users</span> </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

@endif


@if(Auth::user()->user_level == 2)
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
@endif