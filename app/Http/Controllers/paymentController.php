<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class paymentController extends Controller
{
    public function paymentCart(Request $request)
    {
        $email = $request->session()->get('email');
        if ($email == null) {
            $email = $request->cookie("email");
        }
        $payments= DB::select("select  p.PRODUCT_IMG, pc.PRODUCT_NAME,pc.PRODUCT_PRICE,pc.PRODUCT_QTY , pc.TOTAL_PRICE from PRODUCT_CART pc, CUSTOMER c, PRODUCT p , CART ct where pc.CART_ID = ct.CART_ID and ct.CUST_ID = c.CUST_ID and pc.PRODUCT_ID = p.PRODUCT_ID and c.CUST_EMAIL = '$email'");
        $response = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => '2fa99950f70c7f4aa948c190016eec11'
        ]);
        $ongkir = '';
        $cities = $response['rajaongkir']['results'];
        return view('payment', compact('payments', 'cities'));

    }
    public function deleteProduk(Request $request)
    {
        $email = $request->session()->get('email');
        if ($email == null) {
            $email = $request->cookie("email");
        }
    
        $delete = DB::delete("delete from PRODUCT_CART where CART_ID = (select CART_ID from CART where CUST_ID = (select CUST_ID from CUSTOMER where CUST_EMAIL = '$email'))");
    
        if ($delete) {
            return redirect()->route('index'); 
        } else {
            return redirect()->back()->with('error', 'No items to delete.'); 
        }
    }
    
}








   