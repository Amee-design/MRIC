<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<link rel="shortcut icon" href="{{asset('main/images/logo.png')}}">

    <meta name='robots' content='noindex, follow' />

	<link media="all" href="{{asset('landing/assets/css/app.min.css')}}" rel="stylesheet" />
	<title>@yield('title')</title>

	<meta property="og:locale" content="en_US" />
	<meta property="og:title" content="" />
	<meta property="og:site_name" content="" />

	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<link rel='dns-prefetch' href='//s.w.org' />
	<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />

	<link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Muli:400,600,700%7CPoppins:600,700&#038;display=swap&#038;ver=1611306310" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="{{asset('landing/assets/js/jquery.min.js?ver=3.6.0')}}" id='jquery-core-js'></script>

</head>

<body class="error404" data-spy="scroll" data-target="#navbar-menu">
    <div class="page-wrapper">
		<header>
			<div class="headerbar">
                <div class="container">
					<div class="logobar">
                        <a href="{{route('home.index')}}" data-wpel-link="internal">
                            <img src="{{asset('main/images/logo.png')}}" style="width: 100px!important" class="img-fluid" alt="logo">
                        </a>
                    </div>
					<div class="menubar">
						<div class="navigationbar">
							<div class="menu-extras">
								<div class="menu-item"> <a class="navbar-toggle">
										<div class="lines"> <span></span> <span></span> <span></span></div>
									</a></div>
							</div>
							<div class="menu-container">
								<div class="menu-main-menu-container">
									<ul id="menu-main-menu" class="navigation-menu">

										<li id="nav-menu-item-64"
											class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-taxonomy menu-item-object-download_category">
											<a href="#" class="menu-link main-menu-link" data-wpel-link="internal">Home</a>
										</li>

										<li id="nav-menu-item-57" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page current_page_parent">
											<a href="#about" class="menu-link main-menu-link" data-wpel-link="internal">About Us</a>
                                        </li>

										<li id="nav-menu-item-58" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
											<a href="#events" class="menu-link main-menu-link" data-wpel-link="internal">Events</a>
                                        </li>

                                        <li id="nav-menu-item-58" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
                                            <a href="#" class="menu-link main-menu-link" data-wpel-link="internal">Donations</a>
                                        </li>

                                        <li id="nav-menu-item-58" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
                                            <a href="#" class="menu-link main-menu-link" data-wpel-link="internal">Store</a>
                                        </li>

										<li id="nav-menu-item-35" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page login-btn">
											<a class="menu-link main-menu-link btn btn-primary" id="show_login" href="{{route('register')}}" data-wpel-link="internal">Sign Up</a>
                                        </li>

										<li id="nav-menu-item-35" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page login-btn">
											<a class="menu-link main-menu-link btn btn-secondary bg-success text-white" id="show_login" href="{{route('login')}}" data-wpel-link="internal">Sign In</a>
                                        </li>

									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

        @yield('content')

        <footer>
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<div id="text-2" class="widget widget_text list-unstyled">
								<h5 class="widgettitle">About Us</h5>
								<div class="textwidget">
									<p>[Short Description Here]</p>
								</div>
							</div>
							<div id="themesbox-social-widget-2" class="widget widget_themesbox_social list-unstyled">
								<h5 class="widgettitle">Follows Us</h5>
								<ul class="socials">
									<li><a href="https://www.facebook.com/#" target="_blank" data-wpel-link="external" rel="external noopener noreferrer">
                                        <i class="feather icon-facebook"></i> </a></li>
									<li><a href="#" target="_blank"> <i class="feather icon-instagram"></i> </a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-5">
							<div id="themesbox-contact-info-widget-2"
								class="widget themesbox-contact-info list-unstyled">
								<h5 class="widgettitle">Contact Us</h5>
								<div class="contact-footer">
									<ul>
										<li>05:00 am to 12:30 pm GMT</li>
										<li><a href="mailto:">xxxxx</a></li>
									</ul>
								</div>
							</div>
							<div id="media_image-2" class="widget widget_media_image list-unstyled">
								<h5 class="widgettitle">Pay Securely</h5><img width="255" height="22"
									src="https://themesbox.in/wp-content/uploads/2019/12/payments.png"
									class="image wp-image-66  attachment-full size-full" alt="payments" loading="lazy"
									style="max-width: 100%; height: auto;" />
							</div>
						</div>
						<div class="col-lg-2">
							<div id="text-3" class="widget widget_text list-unstyled">
								<h5 class="widgettitle">Quick Links</h5>
								<div class="textwidget">
									<ul class="list-unstyled mb-0">
										<li><a href="#" data-wpel-link="internal">About Us</a></li>
										<li><a href="#" data-wpel-link="internal">Events</a></li>
                                        <li><a href="#" data-wpel-link="internal">Donations</a></li>
										<li><a href="#" data-wpel-link="internal">Privacy Policy</a></li>
										<li><a href="#" data-wpel-link="internal">Terms &amp; Conditions</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<p class="mb-0 text-white">&copy; {{date('Y')}}. Muhammad Rasulullah
                        Islamic Centre</p>
				</div>
			</div>
		</footer>
	</div>
	<script src="{{asset('landing/assets/js/app.min.js')}}"></script>
	</div>
</body>

</html>
