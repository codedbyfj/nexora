<?php

use Illuminate\Support\Facades\Route;
use CodedByFJ\Nexora\Http\Controllers\Admin\PageBuilderController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('app.admin_url') . '/nexora'], function () {
    Route::get('builder/{page_slug?}', [PageBuilderController::class, 'index'])->name('admin.nexora.builder.index');
    Route::post('builder/save', [PageBuilderController::class, 'save'])->name('admin.nexora.builder.save');
    Route::get('sections/schema', [PageBuilderController::class, 'getSchema'])->name('admin.nexora.sections.schema');
});
