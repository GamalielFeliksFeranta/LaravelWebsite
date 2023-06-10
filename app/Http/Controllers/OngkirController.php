<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => '2fa99950f70c7f4aa948c190016eec11'
        ]);
        $ongkir = '';
        $cities = $response['rajaongkir']['results'];
        return view('cek-ongkir', compact('cities', 'ongkir'));
    }
    

public function cekOngkir(Request $request)
{   
    $response = Http::get('https://api.rajaongkir.com/starter/city', [
        'key' => '2fa99950f70c7f4aa948c190016eec11'
    ]);

    $responseCost = Http::post('https://api.rajaongkir.com/starter/cost', [
        'origin' => $request->origin,
        'destination' => $request->destination,
        'weight' => $request->weight,
        'courier' => $request->courier,
        'key' => '2fa99950f70c7f4aa948c190016eec11'
    ]);

    $cities = $response['rajaongkir']['results'];
    $ongkir = $responseCost['rajaongkir']['results']; // Assign a value to $ongkir variable

    return view('cek-ongkir', compact('cities', 'ongkir'));
}}
?>