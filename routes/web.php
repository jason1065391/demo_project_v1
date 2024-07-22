<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});



// 獲取城市列表
Route::get('/cities', [CityController::class, 'index']);
// 獲取區域列表
Route::get('/districts/{cityId}', [DistrictController::class, 'getDistricts']);