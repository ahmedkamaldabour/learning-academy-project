@php
    if(Route::currentRouteName() == 'front.homepage')
        $name = 'home_menu';
    else
        $name = 'single_page_menu';
@endphp
<header class="main_menu {{$name}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('front.homepage')}}"> <img
                                src="{{asset('uploaded')}}/settings/{{$settings->logo}}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('front.homepage')}}">Home</a>
                            </li>
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link" href="about.html">About</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link" href="cource.html">Courses</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link" href="blog.html">Blog</a>--}}
                            {{--                            </li>--}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Courses
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    @foreach($categories as $category)
                                        <a class="dropdown-item"
                                           href="{{route('front.category',$category->id)}}">{{$category->name}}</a>
                                    @endforeach
                                    {{--                                    <a class="dropdown-item" href="single-blog.html">Single blog</a>--}}

                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('front.contact')}}">Contact</a>
                            </li>

                            {{--                           Button have droplist and have a button to logout and profile --}}
                            @if(auth()->guard('web')->check())
                                <li class="nav-item">

                                    <a class="nav-link" href="#">My Course</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{auth()->guard('web')->user()->name}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('front.wishlist')}}">Wishlist</a>
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="{{route('front.auth.logout')}}">Logout</a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.login')}}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.register')}}">Register</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
