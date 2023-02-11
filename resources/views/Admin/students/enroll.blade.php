@extends('layouts.Dashboard.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mr-2 mb-2">
                    <h1>Enroll ( {{$student->name}} ) In new Course</h1>
                </div>
                <div class="row mr-2 mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.students.show',$student->id)}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        <form action="{{route('admin.students.enroll',$student->id)}}" method='post'>
                            @csrf
                            <div class="form-select form-select-lg mb-3">
                                <label for="category_id"> Select Course To Enroll </label>
                                <select name="course_id" id="category_id" class="form-control">
                                    <option value="{{old("course_id")}}">-----------</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary pr-4 pl-4">ADD</button>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection