<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\FoundersController;



Route::resource('schools', SchoolsController::class);

Route::resource('founders', FoundersController::class);


