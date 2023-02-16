@extends('layouts.Dashboard.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Admin Info </h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.admins.index')}}" class="btn btn-primary">All Admins</a>
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
                        <form action="{{route('admin.admins.update',$admin->id)}}" method='post'>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Admin Name</label>
                                <input type="text" class="form-control" name='name' id="name" value="{{$admin->name}}"
                                       placeholder="Enter the Admin Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name='email' id="email"
                                       value="{{$admin->email}}"
                                       placeholder="Enter the Admin Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name='password' id="password"
                                       placeholder="Enter the Admin New Password">
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