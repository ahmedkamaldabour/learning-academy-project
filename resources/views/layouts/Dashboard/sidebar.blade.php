<aside class='main-sidebar sidebar-dark-primary elevation-4'>

    <!-- Sidebar -->
    <div class='sidebar'>
        <!-- Sidebar Menu -->
        <nav class='mt-2'>
            <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu'
                data-accordion='false'>
                <!-- Add icons to the links using the .nav-icon class
                                                         with font-awesome or any other icon font library -->
                <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='nav-icon fas fa-th'></i>
                        <p>
                            Test
                        </p>
                    </a>
                </li>

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
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>