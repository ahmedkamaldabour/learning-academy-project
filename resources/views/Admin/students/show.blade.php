@extends('layouts.Dashboard.master')

@section('content')

    <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @include('messages.flash')
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row container">
                    <div class="col-md-3"></div>
                    <div class="card text-center" style="width: 45rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$student->name}}</li>
                            <li class="list-group-item">{{$student->email}}</li>
                            <li class="list-group-item">{{$student->phone}}</li>
                            @if($student->specialized_at)
                                <li class="list-group-item">{{$student->specialized_at}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class='text-center'>
                    <h1>Enrollments</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">

                        <div class="text-right">
                            <a href="{{route('admin.students.enrollForm',[$student->id])}}"
                               class="btn btn-primary mb-2">Enroll
                                Into new course </a>
                        </div>

                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>image</th>
                            <th>Courses Enrollments</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Trainer</th>
                            <th style="width: 50px">Actions</th>
                        </tr>
                        </thead>
                        @foreach($enrollments as $enrollment)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{asset('uploaded/courses/'.$enrollment->image)}}"
                                         style="width: 100px;height: 100px"></td>
                                <td>{{$enrollment->name}}</td>
                                <td>
                                    {{$enrollment->pivot->status}}
                                </td>
                                <td>{{$enrollment->category->name}}</td>
                                <td>{{$enrollment->trainer->name}}</td>
                                <td>
                                    @if($enrollment->pivot->status == 'pending')
                                        <form action="{{route('admin.students.approve',[$student->id,$enrollment->id])}}"
                                              method="post">
                                            @csrf
                                            {{--                                            <input type="hidden" name="student_id" value="{{$student->id}}">--}}
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>
                                        <div class="mt-2"></div>
                                        <form action="{{route('admin.students.reject',[$student->id,$enrollment->id])}}"
                                              method="post">
                                            @csrf
                                            {{--                                            <input type="hidden" name="student_id" value="{{$student->id}}">--}}
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    @endif
                                    @if($enrollment->pivot->status == 'approve' )
                                        <form action="{{route('admin.students.reject',[$student->id,$enrollment->id])}}"
                                              method="post">
                                            @csrf
                                            {{--                                            <input type="hidden" name="student_id" value="{{$student->id}}">--}}
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                        </form>
                                    @endif
                                    @if($enrollment->pivot->status == 'reject' )
                                        <form action="{{route('admin.students.approve',[$student->id,$enrollment->id])}}"
                                              method="post">
                                            @csrf
                                            {{--                                            <input type="hidden" name="student_id" value="{{$student->id}}">--}}
                                            <button type="submit" class="btn btn-success">Approve</button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->

        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{--show the sudent enrollment courses --}}

@endsection