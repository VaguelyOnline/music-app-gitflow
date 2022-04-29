<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('text', function () {
    return Cache::remember('text', now()->addHour(), function () {
        $url = 'https://www.gutenberg.org/cache/epub/10/pg10.txt';
        return [
            'text' => Http::get($url)->body(),
            'url' => $url,
            'time' => now()
        ];
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
