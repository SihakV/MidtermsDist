<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::get('/upload', [FileUploadController::class, 'showUploadForm'])->name('upload.show');
Route::post('/upload', [FileUploadController::class, 'processUpload'])->name('upload.process');
Route::get('/', function () {
    return redirect('/upload');
});