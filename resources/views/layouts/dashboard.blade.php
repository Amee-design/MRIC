<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('main/images/logo.png') }}">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{ asset('main/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <link href="{{asset('main/plugins/apexcharts/apexcharts.css')}}" rel="stylesheet">

    <!-- Slick css -->
    <link href="{{asset('main/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('main/plugins/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('main/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{asset('main/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Calendar css -->
    <link href="{{ asset('main/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('main/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('main/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('main/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('main/css/style.css') }}" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- End css -->
</head>

<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        <div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="{{route('admin.home')}}" class="logo logo-large">
                        <img src="{{ asset('main/images/logo.png') }}" style="width:80px; height:80px;"
                            class="img-fluid" alt="logo"></a>
                    <a href="{{route('admin.home')}}" class="logo logo-small"><img
                            src="{{ asset('main/images/logo.png') }}"style="width:80px; height:80px;" class="img-fluid"
                            alt="logo"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
                        @if (Str::contains(Route::currentRouteName(), 'admin'))

                        <li>
                            <a href="{{route('admin.home')}}">
                                <i class="ri-home-4-fill"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="ri-user-6-fill"></i><span>Members</span>
                                <i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{route('admin.users', ['type'=>'verified'])}}">Verified</a></li>
                                <li><a href="{{route('admin.users', ['type'=>'unverified'])}}">Unverified</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <i class="ri-file-list-line"></i><span>Events</span>
                            <i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="{{route('admin.categories')}}">Event Categories</a></li>
                                <li><a href="{{route('admin.posts')}}">Post Event</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('admin.pages')}}">
                                <i class="ri-file-4-fill"></i>
                                <span>Manage Pages</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.settings')}}">
                                <i class="ri-setting-4-fill"></i>
                                <span>Site Info</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ri-shopping-bag-fill"></i><span>Donations</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ri-shopping-cart-line"></i><span>Store</span>
                            </a>
                        </li>

                        <li class="vertical-header"></li>

                        @elseif(Str::contains(Route::currentRouteName(), 'account'))
                        <li>
                            <a href="#">
                                <i class="ri-home-4-fill"></i><span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ri-file-text-line"></i><span>My Donations</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ri-file-text-line"></i><span>Events</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>
        <!-- End Leftbar -->
    </div>
    <!-- End Containerbar -->

    <!-- Start Rightbar -->
    <div class="rightbar">
        <!-- Start Topbar Mobile -->
        <div class="topbar-mobile">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="mobile-logobar">
                        <a href="#" class="mobile-logo">
                            <img src="{{ asset('main/images/logo.png') }}" style="width:60px; height:60px;" class="img-fluid" alt="logo">
                        </a>
                    </div>
                    <div class="mobile-togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="topbar-toggle-icon">
                                    <a class="topbar-toggle-hamburger" href="javascript:void();">
                                        <i class="ri-more-fill menu-hamburger-horizontal"></i>
                                        <i class="ri-more-2-fill menu-hamburger-vertical"></i>
                                     </a>
                                 </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                        <i class="ri-close-line menu-hamburger-close"></i>
                                     </a>
                                 </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Topbar -->
        <div class="topbar">
            <!-- Start row -->
            <div class="row align-items-center">
                <!-- Start col -->
                <div class="col-md-12 align-self-center">
                    <div class="togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                        <i class="ri-close-line menu-hamburger-close"></i>
                                     </a>
                                 </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="searchbar">
                                    <form>
                                        <div class="input-group">
                                          <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                          <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon2"><i class="ri-search-2-line"></i></button>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">

                            <li class="list-inline-item">
                                <div class="notifybar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-notification-line"></i>
                                        <span class="live-icon"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                            <div class="notification-dropdown-title">
                                                <h5>Notifications<a href="#">Clear all</a></h5>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="media dropdown-item">
                                                    <span class="action-icon badge badge-primary"><i class="ri-bank-card-2-line"></i></span>
                                                    <div class="media-body">
                                                        <h5 class="action-title">Payment Success !!!</h5>
                                                        <p><span class="timing">Today, 09:05 AM</span></p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="notification-dropdown-footer">
                                                <h5><a href="#">See all</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{asset('main/images/users/profile.svg')}}" class="img-fluid" alt="profile">
                                            <span class="live-icon">{{auth()->user()->email}}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <a class="dropdown-item" href="#"><i class="ri-user-6-line"></i>My Profile</a>
                                            <a class="dropdown-item" href="#"><i class="ri-settings-3-line"></i>Settings</a>
                                            <a class="dropdown-item text-danger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ri-shut-down-line"></i>Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Topbar -->

        @yield('content')

        <!-- Start Footerbar -->
        <div class="footerbar">
            <footer class="footer">
                <p class="mb-0">&copy; {{date('Y')}} Muhammad Rasulullah Islamic Centre - All Rights Reserved.</p>
            </footer>
        </div>
        <!-- End Footerbar -->
    </div>
    <!-- End Rightbar -->

    <!-- Start js -->
    <script src="{{asset('main/js/jquery.min.js')}}"></script>
    <script src="{{asset('main/js/popper.min.js')}}"></script>
    <script src="{{asset('main/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('main/js/modernizr.min.js')}}"></script>
    <script src="{{asset('main/js/detect.js')}}"></script>
    <script src="{{asset('main/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('main/js/vertical-menu.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- Datatable js -->
    <script src="{{asset('main/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('main/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('main/js/custom/custom-table-datatable.js')}}"></script>
    <!-- Switchery js -->
    <script src="{{asset('main/plugins/switchery/switchery.min.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{asset('main/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('main/plugins/moment/moment.js')}}"></script>
    <!-- Apex js -->
    <script src="{{asset('main/plugins/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('main/plugins/apexcharts/irregular-data-series.js')}}"></script>
    <!-- Slick js -->
    <script src="{{asset('main/plugins/slick/slick.min.js')}}"></script>
    <script src="{{asset('main/js/custom/custom-dashboard-ecommerce.js')}}"></script>

    <script src="{{asset('main/plugins/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('main/js/custom/custom-calender.js')}}"></script>
    <!-- Core js -->
    <script src="{{asset('main/js/core.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    @stack('scripts')
    <!-- End js -->
</body>

</html>
