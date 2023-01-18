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
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection

@section('js')
@endsection
