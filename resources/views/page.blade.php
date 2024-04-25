@extends('layouts.landing')

@section('title', $page->title . ' | MRIC')

@section('content')

<section class="section" id="about">
    <div class="container">
        <div class="row">
            <!-- Start col -->
            <div class="col-md-8">
                <h2>{{$page->title}}</h2>
                <div class="row p-3">
                    {!! $page->content !!}
                </div>
            </div>
            <!-- End col -->
            @include('partials.sidebar')
        </div>
    </div>
</section>

@endsection
