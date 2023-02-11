@extends('layouts.Dashboard.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Course</h1>
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
                        <form action="{{route('admin.courses.store')}}" method='post' enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input type="text" class="form-control" name='name' id="name" value="{{old('name')}}"
                                       placeholder="Enter the Course Name">
                            </div>
                            <div class="form-group">
                                <label for="price">Course Price</label>
                                <input type="text" class="form-control" name='price' id="price"
                                       value="{{old('price')}}"
                                       placeholder="Enter the Course Price">
                            </div>
                            <div class="form-group">
                                <label for="small_description">Course Small Description</label>
                                <input type="text" class="form-control" name='small_description' id="small_description"
                                       value="{{old('small_description')}}"
                                       placeholder="Enter the Course Small Description">
                            </div>
                            <div class="form-group">
                                <label for="description">Course Description</label>
                                <textarea class="form-control" name='description' id="description"
                                          placeholder="Enter the Course Description">{{old('description')}}</textarea>
                            </div>
                            <div class="form-select form-select-lg mb-3">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="{{old("category_id")}}">-----------</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-select form-select-lg mb-3">
                                <label for="trainer_id">Trainer</label>
                                <select name="trainer_id" id="trainer_id" class="form-control">
                                    <option value="{{old("trainer_id")}}">-----------</option>
                                    @foreach($trainers as $trainer)
                                        <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Course Image</label>
                                <input type="file" class="form-control-file" name='image' id="image"
                                       value="{{old('image')}}"
                                       placeholder="Enter the Course Image">
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