<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class checkoutController extends Controller
{
    public function displayCart(Request $request)
    {
        $email = $request->session()->get('email');
        if ($email == null) {
            $email = $request->cookie("email");
        }
        $cartItems= DB::select("select  p.PRODUCT_IMG, pc.PRODUCT_NAME,pc.PRODUCT_PRICE,pc.PRODUCT_QTY , pc.TOTAL_PRICE from PRODUCT_CART pc, CUSTOMER c, PRODUCT p , CART ct where pc.CART_ID = ct.CART_ID and ct.CUST_ID = c.CUST_ID and pc.PRODUCT_ID = p.PRODUCT_ID and c.CUST_EMAIL = '$email'");
        
        return view('checkout',compact('cartItems'));
    }
   
}



