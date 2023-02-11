@extends('layouts.Dashboard.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Student</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.students.index')}}" class="btn btn-primary">Back to All Students</a>
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
                        <form action="{{route('admin.students.store')}}" method='post'>
                            @csrf
                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" class="form-control" name='name' id="name" value="{{old('name')}}"
                                       placeholder="Enter the Student Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Student Email</label>
                                <input type="email" class="form-control" name='email' id="email"
                                       value="{{old('email')}}"
                                       placeholder="Enter the Student Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Student Phone</label>
                                <input type="text" class="form-control" name='phone' id="phone"
                                       value="{{old('phone')}}"
                                       placeholder="Enter the Student Phone">
                            </div>
                            <div class="form-group">
                                <label for="specialized_at">Student Specialization</label>
                                <input type="text" class="form-control" name='specialized_at' id="specialized_at"
                                       value="{{old('specialized_at')}}"
                                       placeholder="Enter the Student Specialization">
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