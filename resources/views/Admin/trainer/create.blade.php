@extends('layouts.Dashboard.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Trainer</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('admin.trainers.index')}}" class="btn btn-primary">Back to All Trainers</a>
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
                        <form action="{{route('admin.trainers.store')}}" method='post' enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Trainer Name</label>
                                <input type="text" class="form-control" name='name' id="name" value="{{old('name')}}"
                                       placeholder="Enter the Trainer Name">
                            </div>

                            <div class="form-group">
                                <label for="email">Trainer Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       value="{{old('email')}}"
                                       placeholder="Enter the Trainer Email">
                            </div>

                            <div class="form-group">
                                <label for="phone">Trainer phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       value="{{old('phone')}}"
                                       placeholder="Enter the Trainer phone">
                            </div>

                            <div class="form-group">
                                <label for="address">Trainer address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                       value="{{old('address')}}"
                                       placeholder="Enter the Trainer address">
                            </div>

                            <div class="form-group">
                                <label for="specialized_at">Trainer specialization</label>
                                <input type="text" class="form-control" name="specialized_at" id="specialized_at"
                                       value="{{old('specialized_at')}}"
                                       placeholder="Enter the Trainer specialization">
                            </div>

                            <div class="form-group">
                                <label for="image">Trainer image</label>
                                <input type="file" class="form-control-file" name="image" id="image">
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