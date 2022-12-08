<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/object', function(Request $request) {
    return view('object');
});

Route::post('/json', function(Request $request) {
    // return response()->json($request->all());

    try {
        Storage::disk('public')->put('images.json', json_encode($request->all()));
    } catch (Exception $exception) {
        Log::error($exception);
    }
})->name('json.file.save');
