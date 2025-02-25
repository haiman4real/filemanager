<?php

use Illuminate\Support\Facades\Route;
use Emmaogunwobi\FileManager\Http\Controllers\FileManagerController;


Route::post('/filemanager/upload', [FileManagerController::class, 'upload'])->name('filemanager.upload');
Route::delete('/filemanager/delete', [FileManagerController::class, 'delete'])->name('filemanager.delete');
Route::get('/filemanager/{id}', [FileManagerController::class, 'getFileDetails'])->name('filemanager.getFileDetails');
