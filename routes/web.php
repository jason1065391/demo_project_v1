<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SubjectController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/teacher_lists', function () {
    return view('teacher_lists');
});

Route::get('/student_cases', function () {
    return view('student_cases');
});

Route::get('/search_student_cases', 'App\Http\Controllers\StudentCaseController@searchStudentCases');


// 獲取城市列表
Route::get('/cities', [CityController::class, 'index']);
// 獲取區域列表
Route::get('/districts/{cityId}', [DistrictController::class, 'getDistricts']);

Route::get('/teacher_lists', [SubjectController::class, 'index'])->name('teacher_lists');
Route::get('/student_cases', [SubjectController::class, 'index'])->name('student_cases');

