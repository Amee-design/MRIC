@extends('layouts.dashboard')

@section('title', 'Admin | MRIC')

@section('content')

    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <button class="btn btn-primary"><i class="ri-add-line align-middle mr-2"></i>ADD</button>
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
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Registered Users</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th data-breakpoints="xs">ID</th>
                                    <th>Name</th>
                                    <th data-breakpoints="xs">Email</th>
                                    <th data-breakpoints="xs sm">Phone</th>
                                    <th data-breakpoints="xs sm">Role</th>
                                    <th data-breakpoints="xs sm">Joined On</th>
                                    <th data-type="html" data-breakpoints="xs sm md">Info</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if($users)
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{($key + 1)}}</td>
                                            <td>{{$user->fname}} {{$user->lname}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                @if($user->role == 'a')
                                                Admin
                                                @else
                                                Member
                                                @endif
                                            </td>
                                            <td>{{$user->created_at}}</td>
                                            <td><a href="javascript:void(0)"><btn class="btn btn-info" onclick="viewProfile({{$user->id}})"><i class="fa fa-eye"></i></btn></a></td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    @if($usersCount > 0)
                    {{$users->links()}}
                    @endif
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->

    </div>
    <!-- End Contentbar -->

    <div class="modal fade profile-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row" id="profile-screen"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        function viewProfile(id)
        {
            $("#profile-modal").modal('show');
            var url = '/admin/get-profile/' + id;
            $.get(url, function(response, status){
                $("#profile-screen").html(response);
            });
        }
    </script>
@endpush


