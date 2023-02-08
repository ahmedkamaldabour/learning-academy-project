@extends('layouts.Dashboard.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Categories</h1>
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
                            {{--                           search by name --}}
                            <div class="card-header">
                                <div class="bottom ">
                                    <form action="{{route('admin.category.index')}}" method="get">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="search" class="form-control"
                                                       value="{{request('search')}}"
                                                       placeholder="Search by name">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-tools">
                                    <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add New
                                        Category</a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>name</th>
                                        <th>Description</th>
                                        <th> Number of Courses</th>
                                        <th style="width: 50px">Actions</th>
                                    </tr>
                                    </thead>
                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td>{{$category->courses_count}}</td>
                                            <td>
                                                <a href="{{route('admin.category.edit',$category->id)}}"
                                                   class="btn btn-sm btn-primary m-1">Edit</a>
                                                <form action="{{route('admin.category.destroy',$category->id)}}"
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
                                {{$categories->links()}}
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
