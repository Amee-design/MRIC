@extends('layouts.dashboard')

@section('title', 'Admin | DarlCreativeHub')

@section('content')

    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Welcome, {{auth()->user()->name}}(admin)</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-8">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6 col-lg-9">
                                <h5 class="card-title mb-0">Monthly Course Sales Report</h5>
                            </div>
                            <div class="col-6 col-lg-3">
                                <select class="form-control font-12">
                                    <option value="class1" selected>Jan 20</option>
                                    <option value="class2">Feb 20</option>
                                    <option value="class3">Mar 20</option>
                                    <option value="class4">Apr 20</option>
                                    <option value="class5">May 20</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 pl-0">
                        <div id="apex-area-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card text-center m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sales by Category</h5>
                    </div>
                    <div class="card-body px-0">
                        <div id="apex-pie-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">Recent Course Purchase</h5>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-outline-light text-muted btn-sm float-right font-12">View</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Student</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Zebronics Mouse</td>
                                        <td>Black Smith</td>
                                        <td>EL265</td>
                                        <td>$49</td>
                                        <td><span class="badge badge-primary">Pending</span></td>
                                    </tr>
                                </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">Revenue</h5>
                            </div>
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                        <a class="dropdown-item font-13" href="#">Refresh</a>
                                        <a class="dropdown-item font-13" href="#">Export</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 pl-0">
                        <div id="apex-bar-chart"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body text-center">
                        <h4>$5985</h4>
                        <p class="card-text">Profit Earned - Feb 20</p>
                        <div id="apex-line-chart"></div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="row">
                            <div class="col-6 border-right">
                                <p class="my-2">Last Month : $9875</p>
                            </div>
                            <div class="col-6">
                                <p class="my-2"><a href="#"><i class="ri-download-line align-middle mr-2"></i>Download Report</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->

@endsection
