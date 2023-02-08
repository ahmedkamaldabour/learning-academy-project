<body class='hold-transition sidebar-mini layout-fixed'>
<div class='wrapper'>
    <!-- Navbar -->
    <nav class='main-header navbar navbar-expand navbar-white navbar-light'>
        <!-- Left navbar links -->
        <ul class='navbar-nav'>
            <li class='nav-item'>
                <a class='nav-link' data-widget='pushmenu' href='#' role='button'><i class='fas fa-bars'></i></a>
            </li>
            <li class='nav-item d-none d-sm-inline-block'>
                <a href='{{route('admin.dashboard')}}' class='nav-link'>Home</a>
            </li>
            {{--        <li class='nav-item d-none d-sm-inline-block'>--}}
            {{--            <a href='#' class='nav-link'>Contact</a>--}}
            {{--        </li>--}}
        </ul>

        <!-- Right navbar links -->
        <ul class='navbar-nav ml-auto'>
            <!-- Navbar Search -->
            <li class='nav-item'>
                <form action="{{route('admin.auth.logout')}}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-danger">LOG OUT</button>
                </form>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->