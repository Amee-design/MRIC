<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<link rel="shortcut icon" href="">

    <meta name='robots' content='noindex, follow' />

	<link media="all" href="{{asset('landing/assets/css/app.min.css')}}" rel="stylesheet" />
	<title>@yield('title')</title>

	<meta property="og:locale" content="en_US" />
	<meta property="og:title" content="" />
	<meta property="og:site_name" content="" />

	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<link rel='dns-prefetch' href='//s.w.org' />
	<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />

	<link rel="preload" as="style"
		href="https://fonts.googleapis.com/css?family=Muli:400,600,700%7CPoppins:600,700&#038;display=swap&#038;ver=1611306310" />
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Muli:400,600,700%7CPoppins:600,700&#038;display=swap&#038;ver=1611306310"
		media="print" onload="this.media='all'">
    <noscript>
	    <link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Muli:400,600,700%7CPoppins:600,700&#038;display=swap&#038;ver=1611306310" />
	</noscript>
	<script type="text/javascript" src="{{asset('landing/assets/js/jquery.min.js?ver=3.6.0')}}" id='jquery-core-js'></script>

</head>

<body class="error404" data-spy="scroll" data-target="#navbar-menu">
    <div class="page-wrapper">
		<header>
			<div class="headerbar">
                <div class="container">
					<div class="logobar"> <a href="https://themesbox.in" data-wpel-link="internal"> <img
								src="https://themesbox.in/wp-content/themes/themesbox/assets/images/logo.svg"
								class="img-fluid" alt="logo"> </a></div>
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
										<li id="nav-menu-item-59"
											class="has-submenu main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
											<a href="#" class="menu-link main-menu-link">Categories</a>
											<div><span class="menu-arrow"></span></div>
											<ul class="submenu menu-odd  menu-depth-1">
												<li id="nav-menu-item-60"
													class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-download_category">
													<a href="https://themesbox.in/item/category/admin-templates/"
														class="menu-link sub-menu-link" data-wpel-link="internal">Admin
														Templates</a></li>
												<li id="nav-menu-item-61"
													class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-download_category">
													<a href="https://themesbox.in/item/category/landing-pages/"
														class="menu-link sub-menu-link"
														data-wpel-link="internal">Landing Pages</a></li>
												<li id="nav-menu-item-63"
													class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-download_category">
													<a href="https://themesbox.in/item/category/wordpress-themes/"
														class="menu-link sub-menu-link"
														data-wpel-link="internal">WordPress Themes</a></li>
												<li id="nav-menu-item-62"
													class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-download_category">
													<a href="https://themesbox.in/item/category/psd-templates/"
														class="menu-link sub-menu-link" data-wpel-link="internal">PSD
														Templates</a></li>
											</ul>
										</li>
										<li id="nav-menu-item-64"
											class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-taxonomy menu-item-object-download_category">
											<a href="https://themesbox.in/item/category/freebies/"
												class="menu-link main-menu-link" data-wpel-link="internal">Freebies</a>
										</li>
										<li id="nav-menu-item-57"
											class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page current_page_parent">
											<a href="https://themesbox.in/blog/" class="menu-link main-menu-link"
												data-wpel-link="internal">Blog</a></li>
										<li id="nav-menu-item-58"
											class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page">
											<a href="https://themesbox.in/support/" class="menu-link main-menu-link"
												data-wpel-link="internal">Support</a></li>
										<li id="nav-menu-item-35"
											class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page login-btn">
											<a class="menu-link main-menu-link btn btn-primary" id="show_login" href=""
												data-wpel-link="internal">Login</a></li>
										<li id="nav-menu-item-36"
											class="has-submenu main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children minicart-menu">
											<a class="menu-link main-menu-link" href="#"><i
													class="feather icon-shopping-cart"></i><span
													class="cart-notify">0</span></a>
											<div><span class="menu-arrow d-md-block d-lg-none"></span></div>
											<ul class="submenu menu-odd menu-depth-1">
												<li
													class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-download_category">
													<p class="edd-cart-number-of-items" style="display:none;">Number of
														items in cart: <span class="edd-cart-quantity">0</span></p>
													<ul class="edd-cart">
														<li class="cart_item empty"><span class="edd_empty_cart">Your
																cart is empty.</span></li>
														<li class="cart_item edd-cart-meta edd_total"
															style="display:none;">Total: <span
																class="cart-total">&#36;0.00</span></li>
														<li class="cart_item edd_checkout" style="display:none;"><a
																href="https://themesbox.in/checkout/"
																data-wpel-link="internal">Checkout</a></li>
													</ul>
												</li>
											</ul>
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
									<p>We take care of all your IT related solutions with creativity &#038; passion. We
										develop products with maximum attention to details. From, Designing to
										Development we keep in mind every aspect that affects your Product, Value and
										Appearance. Cheers !!</p>
								</div>
							</div>
							<div id="themesbox-social-widget-2" class="widget widget_themesbox_social list-unstyled">
								<h5 class="widgettitle">Follows Us</h5>
								<ul class="socials">
									<li><a href="https://www.facebook.com/Themes-Box-104644314374974/" target="_blank"
											data-wpel-link="external" rel="external noopener noreferrer"> <i
												class="feather icon-facebook"></i> </a></li>
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
										<li><a href="#" data-wpel-link="internal">Blog</a></li>
										<li><a href="#
												data-wpel-link="internal">Support</a></li>
										<li><a href="#"
												data-wpel-link="internal">Privacy Policy</a></li>
										<li><a href="#"
												data-wpel-link="internal">Terms &amp; Conditions</a></li>
										<li><a href="#"
												data-wpel-link="internal">Refund Policy</a></li>
										<li><a href="#"
												data-wpel-link="external"
												rel="external noopener noreferrer">Crazydomains</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<p class="mb-0 text-white">© 2021. Timanet</p>
				</div>
			</div>
		</footer>
	</div>
	<script src="{{asset('landing/assets/js/app.min.js')}}"></script>
	</div>
</body>

</html>
