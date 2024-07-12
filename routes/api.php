<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/sendmail/OTP", [UserController::class, 'sendmail']);

Route::post("/verifyOTP", [UserController::class, 'verifyOTP']);

Route::delete("/unRegister",[UserController::class,'unRegister']);

Route::post("/save", [WeatherReportController::class,'store']);

Route::get("/reports",[WeatherReportController::class,'getReportDates']);

Route::get("/getByDate/{date}",[WeatherReportController::class,'getWeatherDataByDate']);

Route::get("/daily",[UserController::class,'dailyEmail']);


Route::get("/test",[UserController::class,'test']);