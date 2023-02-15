@extends('layouts.EndUser.master')

@section('title', 'Home')

@section('css')
@endsection


@section('content')

    @section('title_breadcrumb', 'Your Favorite Courses')
    @section('breadcrumb')
        <p>HomePage<span>/</span>Course<span>/</span>Wishlist</p>
    @endsection
    @include('website.partial.breadcrumb')
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                {{--               show favourite couses for this user --}}
                @if($courses->count() > 0)
                    @foreach($courses as $course)

                        <div class="col-lg-4 col-md-6">
                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{asset("/uploaded/courses/$course->image")}}" alt="">
                                </div>
                                <div class="course_content">
                                    <h4 class="mb-3">
                                        <a href="{{route('front.singleCourse', $course->id)}}">{{$course->name}}</a>
                                    </h4>
                                    <p>
                                        @if($course->price == 0)
                                            Free
                                        @else
                                            {{$course->price}} $
                                        @endif
                                    </p>
                                    <p>{{$course->small_description}}</p>
                                    <a href="{{route('front.course.remove.favorite', $course->id)}}"
                                       class="genric-btn danger circle arrow">Remove<span
                                                class="lnr lnr-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="col-lg-12">
                        <div class="single_course">
                            <div class="course_content">
                                <h4 class="mb-3">
                                    <a href="#">No Favorite Courses</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

@endsection

@section('js')
@endsection