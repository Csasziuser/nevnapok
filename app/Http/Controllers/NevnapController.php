<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nevnap;

class NevnapController extends Controller
{
    function index(Request $request)
    {
        $ho = explode('-',$request->get('nap'))[0];
        $nap = explode('-',$request->get('nap'))[1];

        $data = Nevnap::where('ho',$ho)->where('nap',$nap)->get();
        $response = response()->json($data);
        $response->headers->set('Access-Control-Allow-Origin','*');

        return $response;
    }
}
