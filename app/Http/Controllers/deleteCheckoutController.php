<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class deleteCheckoutController extends Controller
{
    public function removeItem($productName, Request $request)
{
    $email = $request->session()->get('email');
        if ($email == null) {
            $email = $request->cookie("email");
        }

        $delete = DB::delete("delete from PRODUCT_CART where PRODUCT_NAME = '$productName' and CART_ID = (select CART_ID from CART where CUST_ID = (select CUST_ID from CUSTOMER where CUST_EMAIL = '$email'))");
    
        if ($delete) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'No items to delete.'); 
        }
}

}
