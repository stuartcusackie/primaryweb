<?php

use Illuminate\Support\Facades\Route;
use App\Models\School;

Route::get('/', function () {
    return view('welcome');
});
