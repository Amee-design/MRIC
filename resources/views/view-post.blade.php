@extends('layouts.landing')

@section('title', $post->title . ' | MRIC')

@section('content')

<section class="section" id="about">
    <div class="container">
        <div class="row">
            <!-- Start col -->
            <div class="col-md-8">
                <h2>{{$post->title}}</h2>
                <img class="card-img-top" src="/storage/images/{{$post->thumbnail}}" alt="{{$post->title}}">
                <div class="row p-3">
                    {!! $post->content !!}
                </div>
            </div>
            <!-- End col -->
            @include('partials.sidebar')
        </div>
    </div>
</section>

@endsection
