<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<style>
		.popup-card {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: #fff;
			width: 300px;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			z-index: 9999;
			display: none;
		}
	
		.popup-card .close-btn {
			position: absolute;
			top: 10px;
			right: 10px;
			cursor: pointer;
		}
	</style>
	<title>SneakItUp</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/etalage.css" rel='stylesheet' type='text/css' />
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
     <!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="css/etalage.css">
					<script src="js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->	
</head>
<body>
    
    

    @php
    
    $productId = $_GET['productId'];
    $productName = $_GET['productName'];
    $productPrice = $_GET['productPrice'];
    $productQty = $_GET['productQty'];
    $productImageSamping1 = $_GET['productImageSamping1'];
    $productImage = $_GET['productImage'];
    $productImageBlkg = $_GET['productImageBlkg'];
    $productDesc = $_GET['productDesc'];

    
    
     @endphp
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
						    	<li><a href="team">About Us</a></li>
						    	<li class="current"><a href="shop">Product</a></li>
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
      
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row">
				<div class="col-md-9 single_left">
				   <div class="single_image">
                    
					     <ul id="etalage">
							<li>
                                <a href="optionallink">
								<img class="etalage_thumb_image" src="{{ asset('images/' . $productImage) }}" />
                                <img class="etalage_source_image" src=" {{ asset('images/' . $productImage) }}" />

								</a>
							</li>
                            <li>
                                @if($productImageSamping1 !== ""){
								<img class="etalage_thumb_image" src="{{ asset('images/' . $productImageSamping1) }}" />
								<img class="etalage_source_image" src="{{ asset('images/' . $productImageSamping1) }}" />
                                }
                                @endif
							</li>
                            <li>
                                @if($productImageBlkg !== ""){
								<img class="etalage_thumb_image" src="{{ asset('images/' . $productImageBlkg) }}" />
								<img class="etalage_source_image" src="{{ asset('images/' . $productImageBlkg) }}" />
                                }
                                @endif
							</li>
						</ul>

					    </div>
				        <!-- end product_slider -->
				        <div class="single_right">
							<form action="{{ route('addToCart') }}" method="POST">
								@csrf
								<input type="hidden" name="PRODUCT_ID" value="{{ $productId }}">
							
								<h3><input type="hidden" name="PRODUCT_NAME" value="{{ $productName }}">{{ $productName }}</h3>
								<p class="m_10">{{ $productDesc }}</p>
								
								<div class="btn_form">
							   	
								</div>
								</div>
								<div class="clear"></div>
								</div>
								<div class="col-md-3">
									<div class="box-info-product">
										<input type="hidden" name="PRODUCT_PRICE" value="{{ $productPrice }}">
										<p class="price2">{{ $productPrice }}</p>

										<ul class="prosuct-qty">
											<span>Quantity:</span>
											<input type="number" value="1" min="1" style="width:225px" name="PRODUCT_QTY">											
										</ul>
										<ul class="prosuct-qty">
											<button type="submit">Add To Cart</button>
										</ul>
									</div>
								</div>
							</form>
							














                            
				        	{{-- <h3> {{$productName}}</h3>
				        	<p class="m_10"> {{$productDesc}}
                                </p>
				        	<ul class="options">
								<h4 class="m_12">Select a Size</h4>
								<li><a href="#">42</a></li>
							</ul>
				        	
							<div class="btn_form">
							   <form>
								 <input type="submit" value="buy now" title="">
							  </form>
							</div>
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
					<p class="price2">{{ $productPrice}}</p>
					       <ul class="prosuct-qty">
								<span>Quantity:</span>
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</ul>
							<button type="submit" name="Submit" class="exclusive" onclick="showPopup()">
							   <span>Add to cart</span>
							</button> --}}
                           
				   </div>
			   </div>
			</div>		
	     </div>
	   </div>
	  </div>
	  @if(session('success'))
		<div id="popup" class="popup-card">
			<span class="close-btn" onclick="closePopup()">&times;</span>
			<p>{{ session('success') }}</p>
		</div>
		<script>
			// Call showPopup function after the page finishes loading
			window.addEventListener('load', function() {
				showPopup();
			});

			function showPopup() {
				document.getElementById("popup").style.display = "block";
				setTimeout(closePopup, 1000);
			}

			function closePopup() {
				document.getElementById("popup").style.display = "none";
			}
		</script>
	@endif

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