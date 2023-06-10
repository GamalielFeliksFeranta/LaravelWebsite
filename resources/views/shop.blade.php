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
		<div class="shop_top1">
		  <div class="container">
			  <div class="row shop_box-top">



				@foreach($data as $datas)
    <div class="col-md-3 shop_box">
        <div class="shop_product">
            <a href="detailproduk
			?productId={{$datas->PRODUCT_ID}}&productName={{$datas->PRODUCT_NAME}}&productPrice={{$datas->PRODUCT_PRICE}}&productDesc={{$datas->PRODUCT_DESK}}&productImageBlkg={{ $datas->PRODUCT_IMG_BLKG }}&productImage={{$datas->PRODUCT_IMG}}&productImageSamping1={{$datas->PRODUCT_IMG_SAMPING1}}&productQty={{$datas->PRODUCT_QTY}}">
				


				
                <img src="images/{{$datas->PRODUCT_IMG}}" class="img-responsive" alt=""/>
            </a>
            <div class="shop_desc">
                <div class="judul">
                    <h3><a href="#" name="namaProduk">{{$datas->PRODUCT_NAME}}</a></h3>
                </div>
                <span class="actual">{{'Rp '.$datas->PRODUCT_PRICE}}</span><br>
                <form action="{{ route('addToCart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="PRODUCT_ID" value="{{$datas->PRODUCT_ID}}">
                    <input type="hidden" name="PRODUCT_NAME" value="{{$datas->PRODUCT_NAME}}">
                    <input type="hidden" name="PRODUCT_PRICE" value="{{$datas->PRODUCT_PRICE}}">
                    <input type="hidden" name="PRODUCT_QTY" value="1">
                    <ul class="buttons">
                        <li class="cart">
							<div id='addToCartForm'><button type="submit" onclick="showPopup()">ADD TO CART</button></div>
							
							<div class="clear"></div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endforeach
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

<!-- halo -->
				{{-- @foreach($data as $datas)
    <div class="col-md-3 shop_box">
        <div class="shop_product">
            <a href="{{$datas->PRODUCT_LINK}}">
                <img src="images/{{$datas->PRODUCT_IMG}}" class="img-responsive" alt=""/>
            </a>
            <div class="shop_desc">
                <div class="judul">
                    <h3><a href="#">{{$datas->PRODUCT_NAME}}</a></h3>
                </div>
                <span class="actual">{{'Rp '.$datas->PRODUCT_PRICE}}</span><br>
                <form action="{{ route('addToCart') }}" method="POST">

                    @csrf
                    <input type="hidden" name="PRODUCT_ID" value="{{$datas->PRODUCT_ID}}">
                    <input type="hidden" name="PRODUCT_NAME" value="{{$datas->PRODUCT_NAME}}">
                    <input type="hidden" name="PRODUCT_PRICE" value="{{$datas->PRODUCT_PRICE}}">
                    <input type="hidden" name="PRODUCT_QTY" value="1">
                    <ul class="buttons">
                        <li class="cart">
                            <button type="submit">Add To Cart</button>
							<li class="shop_btn"><a href="{{$datas->PRODUCT_LINK}}">Read More</a></li>
							<div class="clear"></div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endforeach --}}
<div class="clear"></div>
<div class="pagination-container">
    <ul class="pagination">
        <li class="page-item{{ ($data->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $data->lastPage(); $i++)
            <li class="page-item{{ ($data->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item{{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</div>		

<!-- 				
				  {{-- <div class="col-md-3 shop_box"><a href="converse grey">
					  <div class="shop_product">
					  <img src="images/Converse Chuck Taylor All-Star 70's High Mason Grey Ivory samping.jpg" class="img-responsive" alt=""/>
					  <span class="new-box">
						  
					  </span>
					  
					  <div class="shop_desc">
						  <div class="judul">
						  <h3><a href="#">{{$data[8]->PRODUCT_NAME}}</a></h3></div>
						  <span class="actual">{{'Rp '.$data[8] ->PRODUCT_PRICE}}</span><br>
						  <ul class="buttons">
							  <li class="cart"><a href="#">Add To Cart</a></li>
							  <li class="shop_btn"><a href="converse grey">Read More</a></li>
							  <div class="clear"> </div>
					  </div>
					  </ul>
				  </a></div></div>
				  <div class="col-md-3 shop_box"><a href="converse black">
					  <div class="shop_product">
					  <img src="images/Converse Chuck Taylor High Black samping depan.jpg" class="img-responsive" alt=""/>
					  <span class="new-box">
				  
					  </span>
					  <div class="shop_desc">
						  <div class="judul">
						  <h3><a href="#">{{$data[10]->PRODUCT_NAME}}</a></h3></div>
						  <span class="actual">{{'Rp '.$data[10] ->PRODUCT_PRICE}}</span><br>
						  <ul class="buttons">
							  <li class="cart"><a href="converse black">Add To Cart</a></li>
							  <li class="shop_btn"><a href="#">Read More</a></li>
							  <div class="clear"> </div>
						  </ul>
					  </div>
				  </a></div></div>
				  <div class="col-md-3 shop_box"><a href="nb pink">
					  <div class="shop_product">
					  <img src="images/New Balance 327 Stone Pink samping depan.jpg" class="img-responsive" alt=""/>
					  <span class="new-box">
						  
					  </span>
					  <div class="shop_desc">
						  <div class="judul">
						  <h3><a href="#">{{$data[1]->PRODUCT_NAME}}</a></h3></div>
						  <span class="actual">{{'Rp '.$data[1] ->PRODUCT_PRICE}}</span><br>
						  <ul class="buttons">
							  <li class="cart"><a href="#">Add To Cart</a></li>
							  <li class="shop_btn"><a href="nb pink">Read More</a></li>
							  <div class="clear"> </div>
						  </ul>
					  </div>
				  </a></div></div>
			  </div>
			  <div class="row shop_box-top">
				  <div class="col-md-3 shop_box"></a>
					  <div class="shop_product">
					<a href="nb 550">
					  <img src="images/New Balance 550 White Grey samping depan.jpg" class="img-responsive" alt=""/>
					  <span class="new-box">
						  <span class="new-label">New</span>
					  </span>
					  <div class="shop_desc">
						  <div class="judul">
						  <h3><a href="#">{{$data[5]->PRODUCT_NAME}}</a></h3></div>
						  <span class="actual">{{'Rp '.$data[5] ->PRODUCT_PRICE}}</span><br>
						  <ul class="buttons">
							  <li class="cart"><a href="#">Add To Cart</a></li>
							  <li class="shop_btn"><a href="nb 550">Read More</a></li>
							  <div class="clear"> </div>
						  </ul>
					  </div>
				  </a></div></div>
				  <div class="col-md-3 shop_box"><a href="nb black">
					  <div class="shop_product">
					  <img src="images/New Balance XC-72 GORE-TEX Black Magnet samping.jpg" class="img-responsive" alt=""/>
					  <span class="new-box">
					  
					  </span>
					  <span class="sale-box">
						  
					  </span>
					  <div class="shop_desc">
						  <div class="judul">
						  <h3><a href="#">{{$data[11]->PRODUCT_NAME}}</a></h3></div>
						  <span class="actual">{{'Rp '.$data[11] ->PRODUCT_PRICE}}</span><br>
						  <ul class="buttons">
							  <li class="cart"><a href="#">Add To Cart</a></li>
							  <li class="shop_btn"><a href="nb black">Read More</a></li>
							  <div class="clear"> </div>
						  </ul>
					  </div>
				  </a></div></div>
				  <div class="col-md-3 shop_box"><a href="nike pink">
					  <div class="shop_product">
					  <img src="images/Nike Air Force 1 '07 QS Valentine's Day Love Letter samping depan.jpg" class="img-responsive" alt=""/>
					  <span class="new-box">
						  <span class="new-label">New</span>
					  </span>
					  <div class="shop_desc">
						  <div class="judul">
						  <h3><a href="#">{{$data[2]->PRODUCT_NAME}}</a></h3></div>
						  <span class="actual">{{'Rp '.$data[2] ->PRODUCT_PRICE}}</span><br>
						  <ul class="buttons">
							  <li class="cart"><a href="#">Add To Cart</a></li>
							  <li class="shop_btn"><a href="nike pink">Read More</a></li>
							  <div class="clear"> </div>
						  </ul>
					  </div>
				  </a></div></div>
				  <div class="col-md-3 shop_box"><a href="nike white">
					  <div class="shop_product">
					  <img src="images/Nike Air Force 1 Low '07 Triple White (2021) Samping depan.jpg" class="img-responsive" alt=""/>
		  
					  <div class="shop_desc">
						  <div class="judul">
						  <h3><a href="#">{{$data[6]->PRODUCT_NAME}}</a></h3></div>
						  <span class="actual">{{'Rp '.$data[6] ->PRODUCT_PRICE}}</span><br>
						  <ul class="buttons">
							  <li class="cart"><a href="#">Add To Cart</a></li>
							  <li class="shop_btn"><a href="nike white">Read More</a></li>
							  <div class="clear"> </div>
						  </ul>
					  </div>
				  </a></div>
				</div>
			  </div>
			  
		   </div> --}} -->
		   
		<script>
			let link=document.getElementsByClassName("link");

			let currentValue =1;
			function activeLink(){
				for(l of link){
					l.classList.remove("active");
				}
				event.target.classList.add("active");
				currentValue = event.target.value;
	
			}

			function backBtn(){
				if(currentValue > 1){
					for(l of link){
					l.classList.remove("active");
					}
					currentValue--;
					link[currentValue-1].classList.add("active");
				}
			}
			function nextBtn(){
				if(currentValue < 3){
					for(l of link){
					l.classList.remove("active");
					}
					currentValue++;
					link[currentValue-1].classList.add("active");
					if(currentValue == 2){
                        window.location.href = "shop2";
                    }
				}
			}
		</script>
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