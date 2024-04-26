@extends('layouts.landing')

@section('title', 'Media | MRIC')

@section('content')

<section class="section" id="about">
    <div class="container-fluid">
        <div class="row">
            <!-- Start col -->
            <div class="col-md-8">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h2 class="card-title">Our Media</h2>
                    </div>
                    <div class="card-body">
                        <!-- Start row -->
                        <div class="row">

                            @if($media)
                                @foreach($media as $key => $med)
                                    <div class="col-xl-6 col-md-6 mb-2">
                                        <div class="card h-100">
                                            <div class="card-header text-center">
                                                <h5>{{$med->title}}</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <iframe class="mt-3 w-100 embed-responsive-item" src="https://www.youtube.com/embed/{{$med->video_id}}" style="height:250px" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-6 text-center">
                                    <p>No media content uploaded yet.</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card mb-5 mt-5">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                {{$media->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            @include('partials.sidebar')
        </div>
    </div>
</section>

@endsection
