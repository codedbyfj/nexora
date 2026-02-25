<?php

use Illuminate\Support\Facades\Route;
use CodedByFJ\Nexora\Http\Controllers\Shop\HomepageController;

Route::group(['middleware' => ['web', 'locale', 'theme', 'currency']], function () {
    Route::get('/', [HomepageController::class, 'index'])->name('shop.home.index');
});
