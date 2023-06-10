<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class contactUsController extends Controller
{
    
      

    public function contactUs(Request $request)
    {
        return view('contact');
    }

    public function contactUsPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        DB::insert("INSERT INTO CONTACT_US (NAME, EMAIL, SUBJECT, MESSAGE) VALUES (?, ?, ?, ?)", [$name, $email, $subject, $message]);

        return redirect()->route('contact');
    }
}

