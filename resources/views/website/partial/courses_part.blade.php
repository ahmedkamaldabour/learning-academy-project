<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>popular courses</p>
                    <h2>Special Courses</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($courses as $course)
                {{--                {{dd($course->trainer)}}--}}
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{asset("/uploaded/courses/$course->image")}}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="{{route('front.category',[$course->category->id])}}"
                               class="btn_4">{{$course->category->name}}</a>
                            <h4>{{$course->price}} $</h4>
                            <a href="{{route('front.singleCourse',[$course->id])}}"><h3>{{$course->name}}</h3></a>
                            <p>{{$course->small_description}}</p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img style="width: 60px"
                                         src="{{asset("/uploaded/trainer/" . $course->trainer->image)}}"
                                         class="special_img mr-5" alt="">
                                    <div class="author_info_text">
                                        <p>Conduct by:</p>
                                        <h5><a>{{$course->trainer->name}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
