<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test', function (Request $request) {
    return [
        'success' => true,
        'Message' => "Request Successful" 
    ];
})->middleware("throttle:api");
