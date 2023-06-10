<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class produkController extends Controller

{
    

public function produk()
{
    $data = DB::table('PRODUCT')->paginate(8);
    return view('shop', compact('data'));
}
    // public function produk()
    // {
    //     $data = DB::select("select PRODUCT_IMG, PRODUCT_NAME, PRODUCT_PRICE from product;");
    //     return view('shop',compact('data'));
    // }
    

    // ini untuk menampilkan produk nama sama price di halaman shop
   
    public function produkCheckout()
    {
         $data = DB::select("select PRODUCT_NAME, PRODUCT_PRICE from PRODUCT;");
         return view('checkout',compact('data'));
     }
    
    //  public function insertProduk(Request $data)
    //  {
    //     $productName = $data->input('product_name');
    //     $productPrice = $data->input('product_price');  
    //     $productID = $data->input('product_id');  
    //     $requestinsert = DB::insert("insert into product_cart(PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE)values('$productID','$productName','$productPrice')");
    //     return view('checkout',compact('data'));
    //  }
    public function searchProduk(Request $request)
{
    $search = $request->input('search');
    
    // Perform the search query using the "like" operator with the wildcard
    $products = DB::table('PRODUCT')
        ->where('PRODUCT_NAME', 'like', '%'.$search.'%')
        ->get();
    
    return view('shop', compact('products'));
}

}


