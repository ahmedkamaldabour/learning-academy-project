@extends('layouts.EndUser.master')

@section('title', "Course Details")

@section('css')
@endsection


@section('content')
    <!-- breadcrumb start-->
    @section('title_breadcrumb', 'Our course')
    @section('breadcrumb')
        <p>HomePage<span>/</span>Course<span>/</span> Enrollments </p>
    @endsection
    @include('website.partial.breadcrumb')
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                @foreach ($courses as $course)
                    {{--                    {{ dd($course->pivot->status) }}--}}
                    <div class="col-lg-4 col-md-6">
                        <div class="single_course">
                            <div class="course_head">
                                <img class="img-fluid" src="{{ asset('uploaded/courses/'.$course->image) }}" alt="" />
                            </div>
                            <div class="course_content mt-3">
                                <h4 class="mb-3">
                                    <a href="{{ route('front.singleCourse', $course->id) }}">{{ $course->name }}</a>
                                </h4>
                                <p>
                                    {{ $course->small_description }}
                                </p>
                                <p class="text-info">
                                    {{ $course->pivot->status}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection

@section('js')
@endsection
