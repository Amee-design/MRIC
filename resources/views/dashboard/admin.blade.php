@extends('layouts.dashboard')

@section('title', 'Admin | MRIC')

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

        <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30 border-info">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Total Members</h5>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30 border-success">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Verified</h5>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30 border-warning">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Unverified</h5>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-3">
                <div class="card m-b-30 border-info">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Total Donations</h5>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h4>0</h4>
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

        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6 col-lg-9">
                                <h5 class="card-title mb-0">Monthly Donations Report</h5>
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
                                <h5 class="card-title mb-0">Recent Donations</h5>
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
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Member</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>125232454534</td>
                                        <td>John Doe</td>
                                        <td>USA</td>
                                        <td>$49.00</td>
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
    </div>
    <!-- End Contentbar -->

@endsection
