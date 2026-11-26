<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\MediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('media', MediaController::class)
    ->parameters(['media' => 'media']);

Route::apiResource('members', MemberController::class)
    ->only(['index', 'show', 'store']);

Route::get('/members/{member}/collection', [MemberController::class, 'collection']);
Route::post('/members/{member}/collection', [MemberController::class, 'addToCollection']);
Route::delete('/members/{member}/collection/{media}', [MemberController::class, 'removeFromCollection']);
