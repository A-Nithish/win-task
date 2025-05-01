<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LocationController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);

Route::get('/countries', [LocationController::class, 'getCountries']);
Route::get('/states', [LocationController::class, 'getStates']);
Route::get('/cities', [LocationController::class, 'getCities']);


Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/states', [StateController::class, 'index'])->name('states.index');
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');




