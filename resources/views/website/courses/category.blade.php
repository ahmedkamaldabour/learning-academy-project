@extends('layouts.EndUser.master')

@section('title', "Category")

@section('css')
@endsection

@section('content')

    <!-- breadcrumb start-->
    @section('title_breadcrumb', 'Our Category')
    @section('breadcrumb')
        <p>HomePage<span>/</span>Courses<span>/</span>{{$category->name}}</p>
    @endsection
    @include('website.partial.breadcrumb')
    <!-- breadcrumb start-->

    <!--::courses_part start::-->
    @include('website.partial.courses_part')

    {{--paginate links --}}
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$courses->links()}}
        </div>
    </div>
    {{--    End paginate links--}}
    <section class="padding_top">
    </section>
    <!--::courses_part end::-->

@endsection

@section('js')
@endsection
