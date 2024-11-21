<?php
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return redirect()->route('photos.index');
});

Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::get('/photos/{photo}', [PhotoController::class, 'show'])->name('photos.show');
Route::get('/photos/{photo}/view', [PhotoController::class, 'view'])->name('photos.view');