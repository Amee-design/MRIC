@extends('layouts.landing')

@section('title', 'Home | MRIC')

@section('content')

<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="auth-box error-box">
                    <!-- Start row -->
                     <div class="row no-gutters align-items-center justify-content-center">
                        <!-- Start col -->
                        <div class="col-md-8 col-lg-6">
                            <div class="text-center">
                                <img src="{{asset('main/images/error/coming-soon.svg')}}" class="img-fluid error-image" alt="coming soon">
                                <h4 class="error-subtitle mb-4">Your account is currently onhold.</h4>
                                <p class="mb-4">You can log back in again later...</p>
                                <div class="row">

                                    <div class="col-md-4 m-auto text-center">
                                        <a href="{{route('logout')}}"><button class="btn btn-info" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button></a>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                    </div>
                    <!-- End row -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
