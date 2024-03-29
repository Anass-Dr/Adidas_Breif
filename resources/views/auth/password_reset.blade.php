<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="front/assets/img/fav.png">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="front/assets/css/linearicons.css">
	<link rel="stylesheet" href="front/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="front/assets/css/themify-icons.css">
	<link rel="stylesheet" href="front/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="front/assets/css/nice-select.css">
	<link rel="stylesheet" href="front/assets/css/nouislider.min.css">
	<link rel="stylesheet" href="front/assets/css/bootstrap.css">
	<link rel="stylesheet" href="front/assets/css/main.css">
	<link rel="stylesheet" href="front/assets/css/toast.css">
</head>

<body>

	<!-- Start Header Area -->
	@extends('layouts.front.header')
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="front/assets/img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="/register">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Enter your Email</h3>
						<form class="row login_form" action="/password-reset" method="post" id="contactForm">
							@csrf
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Request reset message</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

    <!-- Toast Notification : -->
    @if (session()->has('status'))
        <div id="toast" class="show">
            <div id="img">Icon</div>
            <div id="desc">{{ session('status') }}</div>
        </div>
    @endif

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									<!-- <div class="col-lg-4 col-md-4">
													<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
												</div>  -->
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="front/assets/img/i1.jpg" alt=""></li>
							<li><img src="front/assets/img/i2.jpg" alt=""></li>
							<li><img src="front/assets/img/i3.jpg" alt=""></li>
							<li><img src="front/assets/img/i4.jpg" alt=""></li>
							<li><img src="front/assets/img/i5.jpg" alt=""></li>
							<li><img src="front/assets/img/i6.jpg" alt=""></li>
							<li><img src="front/assets/img/i7.jpg" alt=""></li>
							<li><img src="front/assets/img/i8.jpg" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->


	<script src="front/assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="front/assets/js/vendor/bootstrap.min.js"></script>
	<script src="front/assets/js/jquery.ajaxchimp.min.js"></script>
	<script src="front/assets/js/jquery.nice-select.min.js"></script>
	<script src="front/assets/js/jquery.sticky.js"></script>
	<script src="front/assets/js/nouislider.min.js"></script>
	<script src="front/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="front/assets/js/owl.carousel.min.js"></script>
	<script src="front/assets/js/main.js"></script>
</body>


<!-- Mirrored from technext.github.io/karma/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jan 2024 11:27:11 GMT -->
</html>
