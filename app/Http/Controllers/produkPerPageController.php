<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class produkPerPageController extends Controller
{
    public function produkPerPage()
    {
         $data = DB::select("select * from PRODUCT;");
         compact('data');
     }
     public function indexProduk()
    {
         $data = DB::select("select * from PRODUCT;");
         return view('index',compact('data'));
     }
}
