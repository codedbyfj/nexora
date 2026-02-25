<?php

use Illuminate\Support\Facades\Route;
use Webkul\BagistoNova\Http\Controllers\Admin\PageBuilderController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('app.admin_url') . '/nova'], function () {
    Route::get('builder/{page_slug?}', [PageBuilderController::class, 'index'])->name('admin.nova.builder.index');
    Route::post('builder/save', [PageBuilderController::class, 'save'])->name('admin.nova.builder.save');
    Route::get('sections/schema', [PageBuilderController::class, 'getSchema'])->name('admin.nova.sections.schema');
});
