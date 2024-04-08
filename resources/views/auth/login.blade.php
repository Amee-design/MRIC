@extends('layouts.auth')

@section('title', 'Signin| MRIC')

@section('content')
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box login-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-6 col-lg-5">
                    <!-- Start Auth Box -->
                    <div class="auth-box-right">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12" style="z-index:4000">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                                            {{ Session::get('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if(Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                                            {{ Session::get('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="form-head">
                                        <a href="{{route('home.index')}}" class="logo">
                                            <img src="{{ asset('main/images/logo.png') }}" class="img-fluid" alt="logo">
                                        </a>
                                    </div>
                                    <h4 class="text-primary my-4">Log in</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox text-left">
                                              <input type="checkbox" class="custom-control-input" name="remember_me" id="rememberme">
                                              <label class="custom-control-label font-14" for="rememberme">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="forgot-psw">
                                            <a id="forgot-psw" href="#" class="font-14">Forgot Password?</a>
                                          </div>
                                        </div>
                                    </div>
                                  <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                </form>
                                <p class="mb-0 mt-3">Don't have a account? <a href="{{route('register')}}">Sign up</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- End Auth Box -->
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Container -->
</div>
<!-- End Containerbar -->
@endsection
