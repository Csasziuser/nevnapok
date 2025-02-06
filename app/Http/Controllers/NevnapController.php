<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nevnap;
use Log;

class NevnapController extends Controller
{
    function index(Request $request)
    {
        if ($request->has('nap'))
        {
            $ho = explode('-',$request->get('nap'))[0];
            $nap = explode('-',$request->get('nap'))[1];
    
            $data = Nevnap::where('ho',$ho)->where('nap',$nap)->get();
            $response = response()->json($data);
            $response->headers->set('Access-Control-Allow-Origin','*');
    
            return $response;
        }
        else if ($request->has('nev'))
        {
            $nev = $request->get('nev');
            $data = Nevnap::where('nev1', $nev)->orWhere('nev2', $nev)->get();

            // setlocale(LC_ALL, "hu_HU.UTF8");
            // $data->ho = strftime("%m", mktime($data->ho));
            $response = response()->json($data);
            $response->headers->set('Access-Control-Allow-Origin','*');
    
            return $response;
        }
    }
}
