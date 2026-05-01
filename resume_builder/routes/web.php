<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get('/', [ResumeController::class, 'index']);
Route::get('/Sabita_Sau_Resume_2026.pdf', [ResumeController::class, 'download']);
