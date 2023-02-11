@extends('layouts.EndUser.master')

@section('title', "Course Details")

@section('css')
@endsection


@section('content')
    <!-- breadcrumb start-->
    @section('title_breadcrumb', 'Our course')
    @section('breadcrumb')
        <p>HomePage<span>/</span>Course<span>/</span> {{$course->category->name}} <span>/</span>{{$course->name}}</p>
    @endsection
    @include('website.partial.breadcrumb')
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{asset("/uploaded/courses/$course->image")}}" alt="">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title_top">Course Description</h4>
                        <div class="content">
                            {!! $course->description !!}
                            {{--                            {{$course->description}}--}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Trainer’s Name</p>
                                    <span class="color">{{$course->trainer->name}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee </p>
                                    <span>${{$course->price}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="my-5">
                        <h4 class="title">Enroll the course</h4>
                        <p>
                            If you want to enroll this course, please fill the form below.
                        </p>
                        @if ($errors->enroll->any())
                            @include('layouts.errorBag', ['errorBag' => 'enroll'])
                        @endif
                        @include('messages.flash')
                        <form class="form-contact contact_form" action={{route('front.message.enroll')}}
                              method="post">
                            @csrf
                            <div class="row">
                                <input class="form-control" type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter your name'"
                                               placeholder='Enter your name'>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" type="text"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter your phone'"
                                               placeholder='Enter your phone'>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="email"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter email address'"
                                               placeholder='Enter email address'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="specialized_at" type="text"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter Speciality'"
                                               placeholder='Enter Speciality'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm btn_1">Enroll</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection

@section('js')
@endsection
