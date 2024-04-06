@extends('layouts.auth')

@section('title', 'Sign Up | MRIC')

@section('content')
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box register-box">
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
                                <form method="post" action="#">
                                    @csrf;
                                    <div class="form-head">
                                        <a href="{{route('home.index')}}" class="logo">
                                            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo">
                                            <h5>DarlCreativeHub</h5>
                                        </a>
                                    </div>
                                    <h4 class="text-primary my-4">Sign Up</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="username" placeholder="Full name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" name="country" id="country" required>
                                            <option value="Student">Student</option>
                                            <option value="Instructor">Instructor</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="cpassword" class="form-control" id="re-password" placeholder="Re-Type Password" required>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-12">
                                            <div class="custom-control custom-checkbox text-left">
                                                <input type="checkbox" class="custom-control-input" name="toc" id="terms">
                                                <label class="custom-control-label font-14" for="terms">I Agree to our Terms & Conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                  <button type="submit" class="btn btn-success btn-lg btn-block font-18">Register</button>
                                </form>
                                <p class="mb-0 mt-3">Already have an account? <a href="{{route('login')}}">Log in</a></p>
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
