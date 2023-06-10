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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	  
     <div class="main">
      <div class="shop_top">
		<div class="container shop_co">
			<h2>Shopping Cart</h2><br>
			<table class="table" style="width: 100%;">
				<thead class="thead-dark">
				  <tr>
					<th scope="col" style="width:30%;" class="subjudul">Product ID</th>
					<th scope="col" class="subjudul">Product Name</th>
					<th scope="col" class="subjudul">Price</th>
					<th scope="col" class="subjudul">Quantity</th>
					<th scope="col" class="subjudul">Total</th>
					<th scope="col" class="subjudul">Delete</th>
				  </tr>
				</thead>
				<tbody>
					@php
					$totalPrice = 0;
					$totalItem =0;
					@endphp
					@foreach($cartItems as $item)
					<tr class="tabel_co">
						<th class="col-md-6" id="ProductID">
							<img src="{{ asset('images/' . $item->PRODUCT_IMG) }}" alt="Product Image" style="width: 150px; height: 150px;">

							<td class="jadisatu" style="width:200px; height: 150px; margin-left: 60px; text-align: center; vertical-align: middle;">{{ $item->PRODUCT_NAME }}</td>
							<td class="jadisatu" style="width:100px; height: 150px; text-align: center; vertical-align: middle;">{{ $item->PRODUCT_PRICE }}</td>
							<td class="jadisatu" style="width:100px; height: 150px; text-align: center; vertical-align: middle;">{{ $item->PRODUCT_QTY }}</td>
							<td class="jadisatu" style="width:100px; height: 150px; text-align: center; vertical-align: middle;">{{ $item->TOTAL_PRICE}}</td>
							<td class="jadisatu" style="width: 20px; text-align: center; vertical-align: middle;">
								<a href="{{ route('removeItem', ['productName' => $item->PRODUCT_NAME]) }}">
								<i class="fa fa-trash-o" style="font-size:24px;color:black"></i>
								</a>
							</td>
						</th>
					</tr>
					@php
					$totalPrice += $item->TOTAL_PRICE;
					$totalItem += $item->PRODUCT_QTY;
					@endphp
					@endforeach
				</tbody>
			</table>
			  </table>
			  <div class="col-md-9"></div>
			  <div class="col-md-3"> <div class="col-md-5 subtotal"> Sub-Total <br><div class="item"> {{$totalItem}} </div></div> <div class="col-md-7 harga" style="padding-top: 20px;">{{$totalPrice}}</div>
</div>
				<div class="col-md-9"></div>
				<div class="col-md-3"><a href="payment"><button type="button">CheckOut</button></a></div>
				
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