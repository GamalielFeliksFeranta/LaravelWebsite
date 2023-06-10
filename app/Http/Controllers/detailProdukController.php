<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailProdukController extends Controller
{
    public function showDetail(Request $request)
    {        
        
        $namaProduk = $request->input('namaProduk');
        $quantities = DB::select("SELECT PRODUCT_QTY, PRODUCT_IMG_SAMPING1, PRODUCT_IMG_SAMPING2, PRODUCT_IMG_BLKG,PRODUCT_DESK from PRODUCT WHERE PRODUCT_NAME = '$namaProduk'");
        return view('detailProduk', compact('quantities'));
    }
}
