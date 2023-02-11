@extends('layouts.Dashboard.master')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update {{$course->name}}</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.courses.index')}}" class="btn btn-primary">Back to All Courses</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        @include('messages.errors')
                        <form action="{{route('admin.courses.update',$course->id)}}" method='post'
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input type="text" class="form-control" name='name' id="name" value="{{$course->name}}"
                                       placeholder="Enter the Course Name">
                            </div>
                            <div class="form-group">
                                <label for="price">Course Price</label>
                                <input type="number" class="form-control" name='price' id="price"
                                       value="{{$course->price}}" placeholder="Enter the Course Price">
                            </div>
                            <div class="form-group">
                                <label for="small_description">Course Small Description</label>
                                <input class="form-control" name='small_description' id="small_description"
                                       value="{{$course->small_description}}"
                                       placeholder="Enter the Course Small Description">
                            </div>
                            <div class="form-group">
                                <label for="description">Course Description</label>
                                <textarea class="form-control" name='description' id="description"
                                          placeholder="Enter the Course Description">{{$course->description}}</textarea>
                            </div>
                            <div class="form-select form-select-lg mb-3">
                                <label for="category_id">Course Category</label>
                                <select class="form-control" name='category_id' id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                {{$course->category_id == $category->id ? 'selected' : ''}}>
                                            {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-select form-select-lg mb-3">
                                <label for="trainer_id">Course Trainer</label>
                                <select class="form-control" name='trainer_id' id="trainer_id">
                                    <option value="">Select Trainer</option>
                                    @foreach($trainers as $trainer)
                                        <option value="{{$trainer->id}}"
                                                {{$course->trainer_id == $trainer->id ? 'selected' : ''}}>
                                            {{$trainer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{asset('uploads/courses/'.$course->image)}}" target="_blank">
                                <img src="{{asset('uploaded/courses/'.$course->image)}}" width="100px"
                                     height="100px"> </a>
                            <div class="form-group">
                                <label for="image">Course Image</label>
                                <input type="file" class="form-control-file" name='image' id="image">
                            </div>

                            <button type="submit" class="btn btn-primary pr-4 pl-4">Update</button>
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