<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Storage;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/projets-apprentissage', [HomeController::class, 'getProjetWithApprentissage']);
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1');

Route::middleware('auth:sanctum')->get('/download/{filename}', function ($filename) {
    $filename = basename($filename);
    $allowed = ['pdf', 'jpg', 'jpeg', 'png'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed) || !Storage::disk('local')->exists('certifications/' . $filename)) {
        abort(404);
    }
    return Storage::disk('local')->download('certifications/' . $filename);
});
