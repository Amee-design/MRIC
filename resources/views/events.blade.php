@extends('layouts.landing')

@section('title', 'Events | MRIC')

@section('content')

<section class="section" id="about">
    <div class="container">
        <div class="row">
            <!-- Start col -->
            <div class="col-md-8">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h2 class="card-title">Our Events</h2>
                    </div>
                    <div class="card-body">
                        <!-- Start row -->
                        <div class="row">

                            @if($events)
                                @foreach($events as $key => $event)
                                    <div class="col-xl-6 col-md-6 mb-2">
                                        <div class="card h-100">
                                            <div class="card-header text-center">
                                                <h4>{{$event->title}}</h4>
                                                <a href="{{url('/')}}/b/{{$event->link}}">
                                                    <img src="/storage/images/{{$event->thumbnail}}" loading="lazy" alt="{{$event->title}} image" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="row"><p>{!!substr($event->excerpt,0,255)!!}...</p></div>
                                                <div class="row">
                                                    <a href="{{url('/')}}/b/{{$event->link}}"><button class="btn btn-primary btn-sm">Find out more</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-6 text-center">
                                    <p>No post uploaded in this category yet.</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card mb-5 mt-5">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                {{$events->links()}}
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
