<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::PUT('/api-create', [App\Http\Controllers\ApiKController::class, 'create']);
Route::GET('/api-create-job-queue', [App\Http\Controllers\ApiKController::class, 'job_queue_create']);
Route::PUT('/api-update', [App\Http\Controllers\ApiKController::class, 'update']);
Route::GET('/api-get', [App\Http\Controllers\ApiKController::class, 'get']);
Route::PUT('/api-login', [App\Http\Controllers\ApiKController::class, 'apilogin']);