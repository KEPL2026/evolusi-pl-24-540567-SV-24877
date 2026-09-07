<?php

use Illuminate\Support\Facades\Route;

// Landing Page Route
Route::get('/', function () {
    return view('landing');
});
