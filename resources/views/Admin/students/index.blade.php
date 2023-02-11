@extends('layouts.Dashboard.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Students</h1>
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
                                @include('Admin.students.filter.filter')

                                <div class="card-tools">
                                    <a href="{{route('admin.students.create')}}" class="btn btn-primary">Add New
                                        Student</a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>name</th>
                                        <th>Email</th>
                                        <th> Phone</th>
                                        <th> Specialization</th>
                                        <th style="width: 50px">Actions</th>
                                    </tr>
                                    </thead>
                                    @foreach($students as $student)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->phone}}</td>
                                            <td>{{$student->specialized_at}}</td>
                                            <td>
                                                <a href="{{route('admin.students.edit',$student->id)}}"
                                                   class="btn btn-sm btn-primary mb-1">Edit</a>
                                                <a href="{{route('admin.students.show',$student->id)}}"
                                                   class="btn btn-sm btn-dark mb-1">Enrollments</a>
                                                <form action="{{route('admin.students.destroy',$student->id)}}"
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
                                {{$students->links()}}
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
