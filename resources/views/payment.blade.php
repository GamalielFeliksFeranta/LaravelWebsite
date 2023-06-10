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

      <div class="main1">
        <h2>Billing Detail</h2>
        <div class="payment-page">
            <div class="billing-detail">
                <form action="{{route('transaction')}}" class="payment-form" method="post">
					@csrf
                    <h4>Shipping Detail</h4>
                    <div class="form-inline">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Company Name (Optional)</label>
                        <input type="text" name="cname">
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" rows="5"></textarea>
                    </div>
					<div class="mt-3">
                    <label for="origin">Asal Kota</label>
                    <select name="origin" id="origin" class="form-control" required>
                        <option value="">Pilih Kota Asal</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="destination">Kota Tujuan</label>
                    <select name="destination" id="destination" class="form-control" required>
                        <option value="">Pilih Kota Tujuan</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                    <h4>Contact</h4>
                    <div class="form-inline">
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="nt">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="ename">
                        </div>
                    </div>

                    <h4>Additional Information (Optional)</h4>
                    <div class="form-group">
                        <label>Order Note</label>
                        <textarea name="additional" rows="3"></textarea>
                    </div>
					
                
				
            </div>
			
			@php
			$subtotal = 0;
			
			@endphp
			
            <div class="payment-summary">
                <div class="payment-total">
					{{-- <form action="{{route('paymentDelete')}}" method="post">
						@csrf
						@method('DELETE') --}}
                    <h3>ORDER SUMARRY</h3>
                    <ul>
						@foreach($payments as $item)
						<li>
							
							<img src="{{ asset('images/' . $item->PRODUCT_IMG) }}" alt="Product Image" style="width: 50px; height: 50px;">
							<span>{{ $item->PRODUCT_PRICE }}</span><a style="margin-left: 10px;">x {{ $item->PRODUCT_QTY }}</a><p style="margin-left: 10px;"> {{ $item->PRODUCT_NAME }}</p>
						</li>
						@php
					$subtotal += $item->TOTAL_PRICE;		
					@endphp	
						@endforeach
						
                        <hr>
                       	<p id="subtotal"> Total Amount <span style="float:right;">{{$subtotal}}</span> </p>
                        <hr>
                        <li><div class="btnorder"><input type="submit" name="payment" value="Place Order" ></div></li>
                    </ul>
							
				</div>
            </div>
        </div>
      </div>
	  		</div>
		</div>
	</div>
</form>
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