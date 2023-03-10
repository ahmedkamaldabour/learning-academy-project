<aside class='main-sidebar sidebar-dark-primary elevation-4'>
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <span class="brand-text font-weight-light">Dabour</span>
    </a>
    <!-- Sidebar -->
    <div class='sidebar'>
        <!-- Sidebar Menu -->
        <nav class='mt-2'>
            <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu'
                data-accordion='false'>
                <!-- Add icons to the links using the .nav-icon class
                                                         with font-awesome or any other icon font library -->

                <li class='nav-item'>
                    <a href='{{route('admin.category.index')}}' class='nav-link'>
                        <i class='nav-icon fas fa-th'></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class='nav-item'>
                    <a href='{{route('admin.trainers.index')}}' class='nav-link'>
                        <i class='nav-icon fas fa-th'></i>
                        <p>
                            Trainers
                        </p>
                    </a>
                </li>
                <li class='nav-item'>
                    <a href='{{route('admin.courses.index')}}' class='nav-link'>
                        <i class='nav-icon fas fa-th'></i>
                        <p>
                            Courses
                        </p>
                    </a>
                </li>
                <li class='nav-item'>
                    <a href='{{route('admin.students.index')}}' class='nav-link'>
                        <i class='nav-icon fas fa-th'></i>
                        <p>
                            Students
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>