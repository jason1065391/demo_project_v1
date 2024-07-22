<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;

// 獲取城市列表
Route::get('/cities', [CityController::class, 'index']);
// 獲取區域列表
Route::get('/districts/{cityId}', [DistrictController::class, 'getDistricts']);