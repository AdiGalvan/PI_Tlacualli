<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMapsService;

class MapController extends Controller
{
    public function showMap()
    {
        return view('map');
    }

    public function getGeocode(Request $request)
    {
        $address = $request->input('address');
        $client = new GoogleMapsService();
        $response = $client->geocode->find($address);
        
        return response()->json($response);
    }
}
