
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Jonathan Jimenez')</title>

	<!-- Meta Data -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="address=no"/>
    <meta name="author" content="ArtTemplate" />
    <meta name="description" content="vCard" />

    <!-- Twitter data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ArtTemplates">
    <meta name="twitter:title" content="vCard">
    <meta name="twitter:description" content="vCard">
    <meta name="twitter:image" content="assets/images/social.jpg">

    <!-- Open Graph data -->
    <meta property="og:title" content="ArtTemplate" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="your url website" />
    <meta property="og:image" content="{{ asset('assets/images/social.jpg') }}" />
    <meta property="og:description" content="vCard" />
    <meta property="og:site_name" content="vCard" />

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/images/favicons/apple-touch-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/images/favicons/apple-touch-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/images/favicons/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/images/favicons/apple-touch-icon-57x57.png') }}">
	<link rel="shortcut icon" href="{{ asset('assets/images/favicons/favicon.png') }}" type="image/png">

    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/vendors/bootstrap.min.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/style.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/custom.css') }}"/>

	<!-- Mapbox-->
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    {{-- <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' /> --}}
	
</head>
<body>
    <main class="main">
	    <div class="container gutter-top gutter-bottom">
		    <div class="row sticky-parent">
			    <!-- Sidebar -->
                <aside class="col-12 col-md-12 col-xl-3">
				    <div class="sidebar box-outer sticky-column">
						<!-- My photo -->
						<div class="sidebar__base-info">
					    	<figure class="avatar-box">
                                <img src="{{ asset('assets/images/jony-profile.jpg') }}" alt="Jonathan Jimenez">
						    </figure>

						    <div class="text-xl-center">
						        <h3 class="title title--h3 sidebar__name">Jonathan Jimenez</h3>
							    <div class="badge">Full Stack</div>
								<div class="badge">
									<a href="{{ asset('assets/CV-Jonathan-Jimenez-Gamero.pdf') }}" download="CV-Jonathan-Jimenez-Gamero.pdf"><i class="las la-cloud-download-alt"></i> Download CV</a>
								</div>
						    </div>
							

							<button class="btn btn--small btn--icon-right sidebar__btn js-btn-toggle"><span>Show Contacts</span><i class="feathericon-chevron-down"></i></button>
						</div>

						<div class="sidebar__additional-info js-show">
							<div class="separation"></div>
		                    <ul class="details-info">
							    <!-- Email -->
							    <li class="details-info__item">
							        <span class="box icon-box"><i class="font-icon icon-envelope"></i></span>
								    <div class="contacts-block__info">
									    <span class="overhead">Email</span>
									    <a class="text-overflow" href="mailto:jonysthil@gmail.com" title="jonysthil@gmail.com">jonysthil@gmail.com</a>
								    </div>
							    </li>
							    <!-- Phone -->
						 	    <li class="details-info__item">
								    <span class="box icon-box"><i class="font-icon icon-phone"></i></span>
								    <div class="contacts-block__info">
									    <span class="overhead">Phone</span>
							            <span class="text-overflow" title="5538030380">5538030380</span>
								    </div>	
							    </li>
								<!-- Birthday -->
					            <li class="details-info__item">
								    <span class="box icon-box"><i class="font-icon icon-calendar"></i></span>
								    <div class="contacts-block__info">
									    <span class="overhead">Birthday</span>
							            <span class="text-overflow" title="July 30, 1993">July 30, 1993</span>
								    </div>
							    </li>
								<!-- Location -->
						        <li class="details-info__item">
								    <span class="box icon-box"><i class="font-icon icon-location"></i></span>
								    <div class="contacts-block__info">
									    <span class="overhead">Location</span>
									    <span class="text-overflow" title="San-Francisco, USA">Ecatepec, México</span>
								    </div>
							    </li>
					        </ul>
						    <div class="separation d-xl-none"></div>

						    <!-- Social -->
						    <div class="social">
							    {{-- <a class="social__link" href="https://www.facebook.com/"><i class="feathericon-facebook"></i></a> --}}
							    <a class="social__link" target="_blank" href="https://www.facebook.com/jonysthil"><i class="lab la-facebook-f"></i></a>
								<a class="social__link" target="_blank" href="https://www.linkedin.com/in/jonathan-jimenez-gamero/"><i class="lab la-linkedin-in"></i></a>
								<a class="social__link" target="_blank" href="https://github.com/jonysthil"><i class="lab la-github"></i></a>
						  	    {{-- <a class="social__link" href="https://www.linkedin.com/"><i class="feathericon-instagram"></i></a> --}}
						    </div>
						</div>	
					</div>	
		        </aside>
		        
				<!-- Content -->
		        <div class="col-12 col-md-12 col-xl-9">
				    <div class="box-outer">
					    <!-- Menu -->
						<div class="nav-container">
						    <ul class="nav">
                                <li class="nav__item"><a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('p.home') }}">About</a></li>
								<li class="nav__item"><a class="{{ request()->is('resume') ? 'active' : '' }}" href="{{ route('p.resume') }}">Resume</a></li>
                                <li class="nav__item"><a class="{{ request()->is('portfolio*') ? 'active' : '' }}" href="{{ route('p.portfolio') }}">Portfolio</a></li>
                                {{-- <li class="nav__item"><a href="blog.html">Blog</a></li> --}}
                                <li class="nav__item"><a class="{{ request()->is('contact') ? 'active' : '' }}" href="{{ route('p.contact') }}">Contact</a></li>
                            </ul>
						</div>

                        @yield('container')
						

					</div><!-- box-outer -->
		        </div><!-- Content -->
			</div><!-- sticky-parent -->
		</div><!-- container -->
    </main>

    <div class="back-to-top"></div>

	<div class="whats">
        <a href="https://wa.me/5215538030380?text=I%20need%20more%20information" target="_blank">
            <img src="{{ asset('assets/images/whatsapp.png') }}">
        </a>
    </div>
	
	<!-- JavaScripts -->
	<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>

	<!-- Mapbox init -->
	<script src="{{ asset('assets/js/mapbox.init.js') }}"></script>

</body>
</html>