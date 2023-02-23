@extends('layouts.EndUser.master')

@section('title', 'Home')

@section('css')
@endsection


@section('content')

    @section('title_breadcrumb', 'Your Information')
    @section('breadcrumb')
        <p>HomePage<span>/</span>Profile<span>/</span>{{$student->name}}</p>
    @endsection
    @include('website.partial.breadcrumb')
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                {{--               show form to update student info --}}
                <div class="my-5">
                    <h4 class="title">Updating Your Information</h4>
                    @if(auth()->check())
                        @if ($errors->profile->any())
                            @include('layouts.errorBag', ['errorBag' => 'profile'])
                        @endif
                        @include('messages.flash')
                        <form class="form-contact contact_form" action={{route('front.changeProfileInfo')}}
                              method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="email"
                                               value="{{$student->email}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="password" type="password"
                                               placeholder="Change the pass if you want">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name"
                                               value="{{$student->name}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" type="text"
                                               value="{{$student->phone}}"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter your phone'"
                                               placeholder='Enter your phone'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="specialized_at" type="text"
                                               value="{{$student->specialized_at}}"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter Speciality'"
                                               placeholder='Enter Speciality'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm btn_1">Update</button>
                            </div>
                        </form>
                    @endif

                </div>

            </div>
        </div>
    </section>

@endsection

@section('js')
@endsection