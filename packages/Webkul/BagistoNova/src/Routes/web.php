<?php

use Illuminate\Support\Facades\Route;
use Webkul\BagistoNova\Http\Controllers\Shop\HomepageController;

Route::group(['middleware' => ['web', 'locale', 'theme', 'currency']], function () {
    Route::get('/', [HomepageController::class, 'index'])->name('shop.home.index');
});
