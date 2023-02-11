@extends('layouts.Dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Courses </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('messages.flash')
                        <div class="card">
                            {{--                            search by name,email,phone,address --}}
                            <div class="card-header">
                                @include('Admin.courses.filter.filter')
                                <div class="card-tools">
                                    <a href="{{route('admin.courses.create')}}" class="btn btn-primary">Add New
                                        Course</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>image</th>
                                        <th>name</th>
                                        <th>price</th>
                                        <th>small_description</th>
                                        <th>description</th>
                                        <th>Category</th>
                                        <th>Trainer</th>
                                        <th style="width: 50px">Actions</th>
                                    </tr>
                                    </thead>
                                    @foreach($courses as $course)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><img src="{{asset('uploaded/courses/'.$course->image)}}"
                                                     style="width: 100px;height: 100px"></td>
                                            <td>{{$course->name}}</td>
                                            <td>{{$course->price}}</td>
                                            <td>{{$course->small_description}}</td>
                                            <td>{{$course->description}}</td>
                                            <td>{{$course->category->name}}</td>
                                            <td>{{$course->trainer->name}}</td>
                                            <td>
                                                <a href="{{route('admin.courses.edit',$course->id)}}"
                                                   class="btn btn-sm btn-primary m-1">Edit</a>
                                                <form action="{{route('admin.courses.destroy',$course->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure This will Be Deleted?')">
                                                        Delete
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{$courses->links()}}
                            </div>
                        </div>
                        <!-- /.card -->
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
