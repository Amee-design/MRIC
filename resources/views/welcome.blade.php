@extends('layouts.landing')

@section('title', 'Home | MRIC')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('landing/images/mric_logo.PNG')}}" class="d-block w-100" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/ui-carousel/ui-carousel-11.jpg" class="d-block w-100" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <span class="w-100 p-3">
                <i class="fa fa-eye" style="font-size: 48px;line-height:48px"></i>
                </span>
                <h4>Our Vision</h4>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima illo, accusamus quas, natus molestias aspernatur in magni qui modi beatae tempore dolorum sapiente consequuntur quos commodi tempora pariatur? Expedita, dolor?</p>
            </div>

            <div class="col-md-4 text-center">
                <span class="w-100 p-3">
                <i class="fa fa-hourglass-2 p-3" style="font-size: 48px;line-height:48px"></i>
                </span>
                <h4>Our Mission</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In nesciunt iure optio facere temporibus eligendi provident tempora, commodi, tenetur eos voluptatem blanditiis id laborum placeat nulla, atque fugit porro recusandae?.</p>
            </div>

            <div class="col-md-4 text-center">
                <span class="w-100 p-3">
                <i class="fa fa-gears p-3" style="font-size: 48px;line-height:48px"></i>
                <span class="w-100 p-3">
                <h4>Our Core Values</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero totam tempora fuga omnis, quam modi eius dolores eveniet laboriosam ratione aspernatur molestiae aliquam amet pariatur error eligendi. Explicabo, quia quae.</p>
            </span></span></div>
        </div>
    </div>
</section>

<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card m-b-30 borderless">
                  <div class="row no-gutters">
                    <div class="col-md-6">
                      <img src="{{asset('landing/images/mric_logo.PNG')}}" class="card-img h-100" alt="Card image">
                    </div>
                    <div class="col-md-6">
                      <div class="card-body">
                        <h5 class="card-title font-18">About Us</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="events">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Events</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-deck m-b-30">
                  <div class="card">
                    <img class="card-img-top" src="{{asset('landing/images/mric_logo.PNG')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title font-18">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="{{asset('landing/images/mric_logo.PNG')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title font-18">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="{{asset('landing/images/mric_logo.PNG')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title font-18">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
