@extends('layouts.Dashboard.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update {{$category->name}} Category</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.category.index')}}" class="btn btn-primary">Back to Categories</a>
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
                        <form action="{{route('admin.category.update',[$category->id])}}" method='post'>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" name='name' id="name"
                                       value="{{$category->name}}"
                                       placeholder="Enter the Category Name">
                            </div>
                            <div class="form-group">
                                <label for="description">Category Description</label>
                                <textarea class="form-control" name="description" id="description"
                                          rows="3">{{$category->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary pr-4 pl-4">UPDATE</button>
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