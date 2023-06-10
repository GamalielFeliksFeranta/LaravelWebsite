<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




class transactionController extends Controller
{
    public function addTransactionDeleteCart(Request $request)
{
    $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'cname' => 'nullable',
        'address' => 'required',
        'nt' => 'required',
        'ename' => 'required',
        'additional' => 'nullable'
    ]);

    $email = $request->session()->get('email');
    if ($email == null) {
        $email = $request->cookie("email");
    }

    $summary = DB::table('PRODUCT_CART AS pc')
        ->join('CART AS ca', 'pc.CART_ID', '=', 'ca.CART_ID')
        ->join('CUSTOMER AS c', 'ca.CUST_ID', '=', 'c.CUST_ID')
        ->where('c.CUST_EMAIL', $email)
        ->sum('pc.TOTAL_PRICE');

    $customerId = DB::table('CUSTOMER')
        ->where('CUST_EMAIL', $email)
        ->value('CUST_ID');

    $lastId = DB::table('TRANSACTION')
        ->orderBy('TRANSACTION_ID', 'desc')
        ->limit(1)
        ->value('TRANSACTION_ID');

    $lastIdNumber = 1;

    if ($lastId) {
        $lastIdNumber = intval(substr($lastId, 2)) + 1;
    }

    $newTransaction = 'TR' . str_pad($lastIdNumber, 8, '0', STR_PAD_LEFT );

    $fname = $request->input('fname');
    $lname = $request->input('lname');
    $cname = $request->input('cname');
    $address = $request->input('address');
    $nt = $request->input('nt');
    $ename = $request->input('ename');
    $additional = $request->input('additional');

    $shippingDetail = DB::table('TRANSACTION')->insert([
        'TRANSACTION_ID' => $newTransaction,
        'CUST_ID' => $customerId,
        'TRANSACTION_DATE' => Carbon::now(),
        'TRANSACTION_AMOUNT' => $summary,
        'FIRST_NAME' => $fname,
        'LAST_NAME' => $lname,
        'COMPANY_NAME' => $cname,
        'ADDRESS' => $address,
        'NO_TLP' => $nt,
        'EMAIL' => $ename,
        'ORDER_NOTE' => $additional
    ]);

    if ($shippingDetail) {
        $email = $request->session()->get('email');
        if ($email == null) {
            $email = $request->cookie("email");
        }
    
        // Insert into detail_transaction
        $productCartItems = DB::table('PRODUCT_CART')
            ->join('CART', 'PRODUCT_CART.CART_ID', '=', 'CART.CART_ID')
            ->join('CUSTOMER', 'CART.CUST_ID', '=', 'CUSTOMER.CUST_ID')
            ->where('CUSTOMER.CUST_EMAIL', $email)
            ->select('PRODUCT_CART.PRODUCT_ID', 'PRODUCT_CART.PRODUCT_QTY', 'PRODUCT_CART.TOTAL_PRICE')
            ->get();
    
        foreach 
            ($productCartItems as $item) {
            $productId = $item->PRODUCT_ID;
            $transactionQty = $item->PRODUCT_QTY;
            $transactionSubtotal = $item->TOTAL_PRICE;
    
            $existingDetail = DB::table('DETAIL_TRANSACTION')
                ->where('TRANSACTION_ID', $newTransaction)
                ->where('PRODUCT_ID', $productId)
                ->first();
    
            if (!$existingDetail) {
                DB::table('DETAIL_TRANSACTION')->insert([
                    'TRANSACTION_ID' => $newTransaction,
                    'PRODUCT_ID' => $productId,
                    'TRANSACTION_QTY' => $transactionQty,
                    'TRANSACTION_SUBTOTAL' => $transactionSubtotal
                ]);

                $oldqty = DB::table('PRODUCT')
                ->where('PRODUCT_ID', $productId)
                ->value('PRODUCT_QTY');

                $newQty = $oldqty - $transactionQty;

                DB::table('PRODUCT')
                ->where('PRODUCT_ID', $productId)
                ->update([
                    'PRODUCT_QTY' => $newQty,
                ]);
            }
        }
    
        // Show pop-up message
        session()->flash('success', 'Transaction added successfully. Thank you!');
    
        // Redirect to the index route
        return redirect()->route('fixOrder')->with('success', 'Transaction added successfully');
    } else {
        return redirect()->route('a')->with('error', 'Shipping Detail Insertion Failed');
    }
    
}    
}




















// class transactionController extends Controller
// {
//     public function addTransactionDeleteCart(Request $request)
// {
//     $request->validate([
//         'fname' => 'required',
//         'lname' => 'required',
//         'cname' => 'nullable',
//         'address' => 'required',
//         'nt' => 'required',
//         'ename' => 'required',
//         'additional' => 'nullable'
//     ]);

//     $email = $request->session()->get('email');

//     $summary = DB::table('product_cart AS pc')
//     ->join('cart AS ca', 'pc.CART_ID', '=', 'ca.CART_ID')
//     ->join('customer AS c', 'ca.CUST_ID', '=', 'c.CUST_ID')
//     ->where('c.CUST_EMAIL', $email)
//     ->sum('pc.TOTAL_PRICE');

//     $customerId = DB::table('customer')
//         ->where('cust_email', $email)
//         ->value('cust_id');

//     $lastId = DB::table('transaction')
//         ->orderBy('transaction_id', 'desc')
//         ->limit(1)
//         ->value('transaction_id');

//     $lastIdNumber = 1;

//     if ($lastId) {
//         $lastIdNumber = intval(substr($lastId, 2)) + 1;
//     }

//     $newTransaction = 'TR' . str_pad($lastIdNumber, 8, '0', STR_PAD_LEFT);

//     $fname = $request->input('fname');
//     $lname = $request->input('lname');
//     $cname = $request->input('cname');
//     $address = $request->input('address');
//     $nt = $request->input('nt');
//     $ename = $request->input('ename');
//     $additional = $request->input('additional');

    

//     $shippingDetail = DB::table('transaction')->insert([
//         'transaction_id' => $newTransaction,
//         'cust_id' => $customerId,
//         'transaction_date' => Carbon::now(),
//         'transaction_amount' => $summary,
//         'first_name' => $fname,
//         'last_name' => $lname,
//         'company_name' => $cname,
//         'address' => $address,
//         'no_tlp' => $nt,
//         'email' => $ename,
//         'order_note' => $additional
//     ]);

//     if ($shippingDetail) {
//         return redirect()->route('login')->with('success', 'Transaction added successfully');
//     } else {
//         return redirect()->route('a')->with('error', 'Shipping Detail Insertion Failed');
//     }
// }





    
// }
