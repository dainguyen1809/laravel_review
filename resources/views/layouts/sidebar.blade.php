<div class="left-side-menu">
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="" alt="" height="16" />
        </span>
        <span class="logo-sm">
            <img src="" alt="" height="16" />
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="" alt="" height="16" />
        </span>
        <span class="logo-sm">
            <img src="" alt="" height="16" />
        </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="metismenu side-nav">
            <li class="side-nav-title side-nav-item">Manage</li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-folder-plus"></i>
                    <span> Dashboard </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li class="side-nav-item">
                        <a href="{{ route('courses.index') }}" aria-expanded="false">
                            Courses
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('students.index') }}" aria-expanded="false">
                            Students
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
