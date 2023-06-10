<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class logoutbtnController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('email');
        Cookie::queue(Cookie::forget('email'));

        return redirect('/login');
    }
}
