@extends('layouts.EndUser.reg_login.LR-master')
@section('title','Register')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('AssetsEndUser/reg-login')}}/images/undraw_remotely_2j6y.svg" alt="Image"
                         class="img-fluid">
                </div>
                <div class="col-md-6  contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Register</h3>
                            </div>
                            @include('messages.errors')
                            <form action="{{route('front.auth.register')}}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name='name' id="name">
                                </div>
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name='email' id="email">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <input type="submit" value="Register" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
