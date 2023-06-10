<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class AddToCartController extends Controller
{

    public function addToCart(Request $request)
{
    $productId = $request->input('PRODUCT_ID');
    $productName = $request->input('PRODUCT_NAME');
    $productPrice = $request->input('PRODUCT_PRICE');
    $productQty = $request->input('PRODUCT_QTY');
    
    $email = $request->session()->get('email');
    if ($email == null) {
        $email = $request->cookie("email");
    }

    if ($email) {
    $customerId = DB::table('CART')
        ->join('CUSTOMER', 'CART.CUST_ID', '=', 'CUSTOMER.CUST_ID')
        ->where('CUSTOMER.CUST_EMAIL', $email)
        ->value('CART.CART_ID');

    $totalPrice = $productPrice * $productQty;

    $existingProduct = DB::table('PRODUCT_CART')
        ->where('CART_ID', $customerId)
        ->where('PRODUCT_ID', $productId)
        ->first();

    if ($existingProduct) {
        // If the product exists, update the quantity
        $newQty = $existingProduct->PRODUCT_QTY + $productQty;
        $newPrice = $totalPrice * $newQty;

        DB::table('PRODUCT_CART')
            ->where('CART_ID', $customerId)
            ->where('PRODUCT_NAME', $productName)
            ->where('PRODUCT_PRICE', $productPrice)
            ->update([
                'PRODUCT_QTY' => $newQty,
                'TOTAL_PRICE' => $newPrice
            ]);
    } else {
        // If the product doesn't exist, insert a new record
        DB::table('PRODUCT_CART')->insert([
            'PRODUCT_ID' => $productId,
            'CART_ID' => $customerId,
            'PRODUCT_NAME' => $productName,
            'PRODUCT_PRICE' => $productPrice,
            'PRODUCT_QTY' => $productQty,
            'TOTAL_PRICE' => $totalPrice
        ]);
    }
    $request->session()->flash('success', 'Item added to cart successfully!');
    
    return redirect()->back();
    } else {
        $request->session()->flash('failed', 'Please Login First!');
    
        return redirect()->route('login');
    }
}

    
   
}



