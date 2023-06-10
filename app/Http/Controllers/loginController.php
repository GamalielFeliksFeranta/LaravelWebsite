<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;




// class LoginController extends Controller
// {
//     public function login(Request $request)
//     {
//         $request->validate([
//             'email' => 'required',
//             'password' => 'required',
//             'remember' => 'nullable',
//         ]);

//         $credentials = $request->only('email', 'password');
//         $remember = $request->filled('remember');

//         if (Auth::attempt($credentials, $remember)) {
//             return redirect()->route('index');
//         } else {
//             return redirect()->route('a');
//         }
//     }
// }














class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'remember' => 'nullable',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        $quantities = DB::select("SELECT CUST_EMAIL, CUST_PASS FROM CUSTOMER WHERE CUST_EMAIL = '$email' AND CUST_PASS = '$password'");

        if (!empty($quantities)) {
            if ($remember) {
                // Store email in session
                $request->session()->put('email', $email);
            } else {
                // Store email in cookie
                $response = new Response('credentials');
                $response->withCookie(cookie("email", $email, 0)); 
                
                error_log($request->cookie('email'));
                error_log("Hey sudah masuk");

                $cookie = cookie('email', $email, 0);
                return redirect()->route('index')->cookie($cookie);
            }

            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('error', 'Email and Password not match');
        }
    }
}







// paling bener
// class LoginController extends Controller
// {
//     public function login(Request $request)
//     {
//         $request->validate([
//             'email' => 'required',
//             'password' => 'required',
//             'remember' => 'nullable',
//         ]);

//         $email = $request->input('email');
//         $password = $request->input('password');

//         $quantities = DB::select("select cust_email, cust_pass from customer where cust_email = '$email' and cust_pass = '$password'");

//         if (!empty($quantities)) {
//             $request->session()->put('email', $email);
//             return redirect()->route('index');
//         } else {
//             return redirect()->route('a');
//         }
//     }
// }




// class loginController extends Controller
// {
//     public function login(Request $terimaLogin)
//     {
//         $terimaLogin->validate([
//             'email' => 'required',
//             'password' => 'required',
//             'remember' => 'nullable',
//         ]);

//         $quantities = DB::select("SELECT cust_email, cust_pass FROM customer WHERE cust_email = '$terimaLogin->email' AND cust_pass = '$terimaLogin->password'");
//         if (!empty($quantities)) {
//             $terimaLogin->session()->put('email', $quantities[0]->cust_email);
//             return redirect()->route('index');
//         } else {
//             return redirect()->route('a');
//         }
//             }
//         }
    

        



// class loginController extends Controller
// {
//     public function login(Request $terimaLogin){
        
//         $terimaLogin -> validate([
//             'email' => "required",
//             'password' => "required",
//             'remember'=>"nullable"
//         ]);
//         $quantities = DB::select("select cust_email , cust_pass from customer where cust_email = '$terimaLogin->email' and cust_pass = '$terimaLogin->password'");
//         if($quantities && $terimaLogin->remember){
//             $terimaLogin->session()->put('email', $terimaLogin->email);
//             return redirect()->route('index');
//         }
//         else{
//             return redirect()->route('a');
//         }
//     }   
// }


























// class loginController extends Controller
// {
//     public function login(Request $terimaLogin){
        
//         $terimaLogin -> validate([
//             'email' => "required",
//             'password' => "required"
//         ]);
//         $quantities = DB::select("select cust_email , cust_pass from customer where cust_email = '$terimaLogin->email' and cust_pass = '$terimaLogin->password'");
//         if($quantities){
//             $terimaLogin->session()->put('cust_email', $quantities[0]->cust_email);
//             Cookie::queue('cust_email', $quantities[0]->cust_email, 60 * 24 * 7);
//             return redirect()->route('index');
//         }
//         else{
//             return redirect()->route('a');
//         }
//     }   
// }


