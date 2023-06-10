<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class registerController extends Controller
{
    public function register(Request $terimaRegister)
{
    // Validation rules
    $terimaRegister->validate([
        'first_name' => 'required',
        'cust_phone' => 'required',
        'email_register' => 'required',
        'password_register' => 'required',
        'confirm_password' => 'required'
    ]);

    // Retrieve the last customer ID from the database
    $lastId = DB::select("SELECT CUST_ID FROM CUSTOMER ORDER BY CUST_ID DESC LIMIT 1");
    $lastIdNumber = 1;

    // Increment the last customer ID to generate a new ID
    if (!empty($lastId)) {
        $lastIdNumber = intval(substr($lastId[0]->CUST_ID, 1)) + 1;
    }

    // Generate new customer and cart IDs
    $newId = 'C' . str_pad($lastIdNumber, 5, '0', STR_PAD_LEFT);
    $newCart = 'CA' . str_pad($lastIdNumber, 8, '0', STR_PAD_LEFT);

    // Insert customer data into the database
    $quantities = DB::insert("INSERT INTO CUSTOMER (CUST_ID, CUST_NAME, CUST_PHONE, CUST_EMAIL, CUST_PASS, CUST_CONFIRM) VALUES ('$newId', '$terimaRegister->first_name', '$terimaRegister->cust_phone', '$terimaRegister->email_register', '$terimaRegister->password_register', '$terimaRegister->confirm_password')");

    // Check if the customer data was inserted successfully
    if ($quantities) {
        // Insert cart data into the database
        $cartQuantities = DB::insert("INSERT INTO CART (CART_ID, CUST_ID) VALUES ('$newCart', '$newId');");
        
        // Check if the cart data was inserted successfully
        if ($cartQuantities) {
            return redirect()->route('login')->with('success', 'Register Success');
        } else {
            return redirect()->route('a')->with('error', 'Cart Insertion Failed');
        }
    } else {
        return redirect()->route('a')->with('error', 'Register Failed');
    }
}

    }

