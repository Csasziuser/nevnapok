<?php

use App\Http\Controllers\NevnapController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/apiminta/nevnapok/?nap={datum}',[NevnapController::class,'index']);
