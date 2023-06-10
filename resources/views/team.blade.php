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
     <!-- Add fancyBox main JS and CSS files -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
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
								<li><a href="index">Home</a></li>
						    	<li class="current"><a href="team">About Us</a></li>
						    	<li><a href="shop">Product</a></li>
								<li><a href="contact">Contact</a></li>									
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
	       </div>
	      </div>
		 </div>
	    </div>
	  </div>
      <div class="main" id="mainAbout">
		<div class="shop_top" id="shop_top1">
		  <div class="container">
			  <h3 class="m_2">About Us</h3>
			  <div class="row">
				  <div class="col-md-5">
					  <img src="images/REMOVE LOGO.png" class="img-responsive" alt="Responsive image">
				  </div>
				  <div class="col-md-7">
					  <p>Welcome to SneakItUp, your ultimate shoe destination for style, comfort, and endless possibilities. Discover the perfect pair to elevate your look and express your unique personality. Our carefully curated collection features the latest trends, classic designs, and everything in between. Step into our store and be captivated by a world of footwear wonders. Our friendly and knowledgeable staff are here to guide you, ensuring a personalized shopping experience like no other. We have partnered with renowned brands and emerging designers who prioritize quality and craftsmanship, ensuring that each pair of shoes you find at SneakItUp is a blend of comfort and durability. At SneakItUp, we're more than just a shoe store; we're your fashion partner, helping you put your best foot forward with every step you take.</p>
				  </div>
				  
				 </div>
			  <div class="row team_box">	
				  <div class="col-md-3 team1">
					  <div class="gambar1">
					  <div id="small-dialog3" class="mfp-hide">				   
					  </div>		   
				  </div>
			  </div>
				  </div>
				  <div class="col-md-3 team1">
					  <a class="popup-with-zoom-anim" href="#small-dialog3"><img src="" class="img-responsive" title="continue" alt=""/></a>
					  <div id="small-dialog3" class="mfp-hide">
						 <div class="pop_up2">
							  
						  </div>
					  </div>
					  <h4 class="m_5"><a href="#"></a></h4>
					  
				  </div>
				  <div class="col-md-3 team1">
					  <a class="popup-with-zoom-anim" href="#small-dialog3"><img src="" class="img-responsive" title="continue" alt=""/></a>
					  <div id="small-dialog3" class="mfp-hide">
						 <div class="pop_up2">
							  </div>
					  </div>
					  <h4 class="m_5"><a href="#"></a></h4>
					  
				  </div>
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
				<li><a href="#">Products</a></li>
				<li><a href="#">New Products</a></li>
				<li><a href="#">Best Seller</a></li>
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