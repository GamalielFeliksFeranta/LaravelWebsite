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
	    		  <!-- start search-->
				   <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
				    <ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="#"> </a>
						<ul class="sub-icon1 list">
						  <div class="product_control_buttons">
						  	<a href="#"><img src="images/edit.png" alt=""/></a>
						  		<a href="#"><img src="images/close_edit.png" alt=""/></a>
						  </div>
						   <div class="clear"></div>
						  <li class="list_img"><img src="images/1.jpg" alt=""/></li>
						  <li class="list_desc"><h4><a href="#">velit esse molestie</a></h4><span class="actual">1 x
                          $12.00</span></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="checkout">Check out</a></div>
							 <div class="login_button"><a href="login">Login</a></div>
							 <div class="clear"></div>
						  </div>
						  <div class="clear"></div>
						</ul>
					 </li>
				   </ul>
		        <div class="clear"></div>
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
									<img class="etalage_thumb_image" src="images/Puma Suede Classic Team Regal Red samping.jpg" />
									<img class="etalage_source_image" src="images/Puma Suede Classic Team Regal Red samping.jpg" />
								</a>
							</li>
						</ul>
					    </div>
				        <!-- end product_slider -->
				        <div class="single_right">



							{{-- <form action="{{ route('addToCart') }}" method="POST">
							@csrf
							
								<input type="hidden" name="PRODUCT_ID" value="{{ $data[0]->PRODUCT_ID }}">
								<input  name="PRODUCT_NAME" value="{{ $data[0]->PRODUCT_NAME }}">
								<input  name="PRODUCT_PRICE" value="{{ $data[0]->PRODUCT_PRICE }}">
							
								<ul class="prosuct-qty">
									<span>Quantity:</span>
									<input type="number" value="1" min="1" style="width:125px" name="PRODUCT_QTY">
								</ul>
							
								<button type="submit">Add To Cart</button>
								</button>
							</form> --}}

							
								
								
									
									
									
								
									
{{-- 								
								<form action="{{ route('addToCart') }}" method="POST">
									@csrf
									<input type="hidden" name="PRODUCT_ID" value="{{ $data[0]->PRODUCT_ID }}">
							<h3><input type="text" name="PRODUCT_NAME" value="{{ $data[0]->PRODUCT_NAME }}" style="border: none; background-color: transparent; font-size: 16px; width: 200px;" readonly>
							</h3>
				        	<p class="m_10">Puma Suede Classic Team Regal Red adalah sepatu sneakers yang ikonik dan klasik dari merek Puma. Sepatu ini menampilkan desain yang retro dengan sentuhan warna merah yang mencolok.

                                Sepatu ini memiliki bentuk low-top yang populer dan siluet yang ramping. Upper atau bagian atas sepatu terbuat dari bahan suede berkualitas tinggi dengan warna merah regal yang mencolok. Desain ini memberikan tampilan yang stylish dan unik.
                                
                                Detail-desain lain yang mencolok pada sepatu ini termasuk logo Puma yang terletak pada sisi sepatu dan lidah sepatu. Terdapat juga jahitan rapi di sekitar upper sepatu yang menambahkan sentuhan estetika yang klasik.
                                
                                Sepatu ini dilengkapi dengan sol karet yang nyaman dan tahan lama, memberikan cengkeraman yang baik dan amortisasi yang optimal saat digunakan. Di bagian dalam sepatu, terdapat lapisan bahan yang lembut dan sol kaki yang empuk untuk memberikan kenyamanan ekstra.
                                
                                Puma Suede Classic Team Regal Red adalah pilihan yang cocok bagi mereka yang menginginkan sepatu dengan desain klasik dan warna yang mencolok. Dengan kombinasi antara desain retro yang timeless dan warna merah yang mencolok, sepatu ini dapat menjadi pernyataan gaya yang menarik dan memberikan tampilan yang bergaya dan berani.
                                </p>
				        	<ul class="options">
								<h4 class="m_12">Select a Size</h4>
								<li><a href="#">42</a></li>
							</ul>
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
					<p class="price"><input type="text" name="PRODUCT_PRICE" value="{{ $data[0]->PRODUCT_PRICE }}" style="border: none; background-color: transparent;" readonly>	</p>
					<ul class="prosuct-qty">
						<span>Quantity:</span>
						<input type="number" value="1" min="1" style="width:125px" name="PRODUCT_QTY">
					</ul>
							</ul>
							<button type="submit">Add To Cart</button>
						</form> --}}
				   </div>
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