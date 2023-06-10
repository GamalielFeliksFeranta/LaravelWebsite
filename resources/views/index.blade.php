<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>SneakItUp</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index"><img src="images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
								<li class="current"><a href="index">Home</a></li>
						    	<li><a href="team">About Us</a></li>
						    	<li><a href="shop">Product</a></li>
								<li><a href="contact">Contact</a></li>		
								<li><a href="contact">
								</a></li>							
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
				    </div>							
	    		    <div class="clear"></div>
	    	    </div>
	            <div class="header_right">
					<div class="loginbtn">
						@if (Session::get('email'))
						<a href="checkout"><img src="images/cart.svg" alt=""></a>
						<a class="user" href="">{{$takeEmail= Session::get('email')}}</a>
						<a class="loginb" href="{{ route('logout') }}">Logout</a>
						@elseif(Cookie::get('email'))
						<a href="checkout"><img src="images/cart.svg" alt=""></a>
						<a class="user" href="">{{Cookie::get('email')}}</a>
							<a class="loginb" href="{{ route('logout') }}">Logout</a>
						@else
						<a href="checkout"><img src="images/cart.svg" alt=""></a>
						<a class="loginb" href="login">Login</a>
						@endif
					</div>
						<div class="clear"></div>
	       </div>
	      </div>
		 </div>
	    </div>
	</div>
	<div class="banner">
	<!-- start slider -->
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
               <img src="images/slider1.jpg" class="img-responsive" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
					<div class="col-md-6">

					</div>
                    <div class="col-md-6 slide_content_wrap" id="slide_content">
                        <!-- Text title -->
                        <h1 class="title">Find our perfect pair of sneakers here!</h1>
                        <!-- /Text c -->
                        <div class="button"><a href="shop">See All Products</a></div>
                    </div>
                </div>
               <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
               <img src="images/slider2.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
					<div class="col-md-1">

                    </div>
                    <div class="col-md-7 slide_content_wrap" id="slide_content_wrap">
						<!-- Text title -->
						<h1 class="title">Walk with <br> confidence in <br> our sneakers</h1>
						<!-- /Text c -->
						<div class="button" id="button-pindah"><a href="shop">Buy Now</a></div>
					</div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
       <!--/slider -->
      </div>
	  <div class="main" id="main">
		<div class="content-top">
			<h2>New Product</h2>
			<p>Step into the future with our new sneakers!</p>
			<div class="close_but"><i class="close1"> </i></div>
			
			<ul id="flexiselDemo3">
				@php
					$counter = 0; // Initialize a counter variable
				@endphp
			
				@foreach($data as $index => $datas)
					@if($index != 0 && $index != 4 && $counter < 6) // Check if the index is not 0, not 4, and the counter is less than 6
						<li>
							<img src="{{ asset('images/' . $datas->PRODUCT_IMG_SAMPING1) }}" alt=""/>
							<h4 class="m_4"><a href="{{$datas->PRODUCT_LINK}}">{{$datas->PRODUCT_NAME}}</a></h4>
						</li>
						
						@php
							$counter++; // Increment the counter after each iteration
						@endphp
					@endif
				@endforeach
			</ul> 
			
			
			
				








				
			
			<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
	<div class="content-bottom">
		<a href="shop"></a>
	</div>
	<div class="features" id="bestseller">
		<div class="container" >
			<h3 class="m_3">Best Seller</h3>
			<div class="close_but"><i class="close1"> </i></div>
			  <div class="row">
				<div class="col-md-3 top_box">
				  <div class="view view-ninth"><a href="nike white">
                    <img src="images/Nike Air Force 1 Low '07 Triple White (2021) Samping depan.jpg" class="img-responsive" alt=""/>
                      <div class="content">
                        <h2>Description</h2>
                        <p>The Nike Air Force 1 Low '07 Triple White is a classic and versatile sneaker that has remained popular for decades.</p>
                      </div>
					</div>
                  <h4 class="m_4"><div class="judul2">

				  <a href="#">Nike Air Force 1 Low '07 Triple White</a></div></h4>
                  <p class="m_5">Rp 1.499.000</p>
                </div>
                <div class="col-md-3 top_box">
					<div class="view view-ninth"><a href="single">
                    <img src="images/New Balance 550 White Grey samping depan.jpg" class="img-responsive" alt=""/>
                      <div class="content">
                        <h2>Description</h2>
                        <p>The New Balance 550 White Grey is a retro-inspired sneaker that features a classic white leather upper with grey accents.</p>
                      </div>
                    </a> </div>
                   <h4 class="m_4"><div class="judul2"><a href="#">New Balance 550 White Grey</a></div></h4>
                   <p class="m_5">Rp 1.199.000</p>
				</div>
				<div class="col-md-3 top_box">
					<div class="view view-ninth"><a href="nb pink">
                    <img src="images/New Balance 327 Stone Pink samping depan.jpg" class="img-responsive" alt=""/>
                      <div class="content">
                        <h2>Description</h2>
                        <p>The New Balance 327 Stone Pink is a stylish sneaker that features a combination of pink and neutral tones on a suede and nylon upper.</p>
                      </div>
                    </a> </div>
                   <h4 class="m_4"><div class="judul2"><a href="#">New Balance 327 Stone Pink</a></div></h4>
                   <p class="m_5">Rp 1.199.000</p>
				</div>
				<div class="col-md-3 top_box">
					<div class="view view-ninth"><a href="nike pink">
                    <img src="images/Nike Air Force 1 '07 QS Valentine's Day Love Letter samping depan.jpg" class="img-responsive" alt=""/>
                      <div class="content">
                        <h2>Description</h2>
                        <p>The Nike Air Force 1 '07 QS Valentine's Day Love Letter is a limited edition sneaker that features a unique design inspired by love letters, with a mix of pink and red hues.</p>
                      </div>
                     </a> </div>
                   <h4 class="m_4"><div class="judul2"><a href="#">Nike Air Force 1 '07 QS Valentine's Day Love Letter</a></div></h4>
                   <p class="m_5">Rp 2.199.000</p>
				</div>
			</div>
		 </div>
	    </div>
		<div class="footer">
			<div class="container">
			 <div class="row">
			  <div class="col-md-3">
			   <ul class="footer_box">
				<h4>Products</h4>
				<li><a href="shop">Products</a></li>
				<li><a href="#main">New Products</a></li>
				<li><a href="#bestseller">Best Seller</a></li>
			   </ul>
			  </div>
			  <div class="col-md-3">
			   <ul class="footer_box">
				<h4>Brands</h4>
				<li><a href="#">Converse</a></li>
				<li><a href="#">New Balance</a></li>
				<li><a href="#">Nike</a></li>
				<li><a href="#">Puma</a></li>
				<li><a href="#">Rebook</a></li>
				<li><a href="#">Vans</a></li>
			   </ul>
			  </div>
			  <div class="col-md-3">
			   <ul class="footer_box">
				<h4>Customer Support</h4>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Phone : +62 81231111651</a></li>
				<li><a href="#">Email : Sneakitup@gmail.com</a></li>
				<li><a href="#">Store Location</a></li>
				
			   </ul>
			  </div>
			  <div class="col-md-3">
			   <ul class="footer_box">
				<h4>Our Latest Promo!</h4>
				<div class="footer_search">
					  <form>
					<input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
					<input type="submit" value="Go">
					  </form>
					  </div>
				<ul class="social"> 
				  <li class="facebook"><a href="#"><span> </span></a></li>
				  <li class="twitter"><a href="#"><span> </span></a></li>
				  <li class="instagram"><a href="#"><span> </span></a></li> 
				  <li class="pinterest"><a href="#"><span> </span></a></li> 
				  <li class="youtube"><a href="#"><span> </span></a></li>                
				   </ul>
				   
			   </ul>
			  </div>
			 </div>
			 <div class="row footer_bottom">
				 <div class="copy">
					   <p>© Sneakitup Indonesia. All Rights Reserved.</p>
					   </div>
			  
				</div>
			</div>
		   </div>
		 </body> 
		 </html>