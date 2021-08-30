<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::resource('stickers', 'App\Http\Controllers\StickerController');
Route::resource('tags', 'App\Http\Controllers\TagController');
Route::resource('stickerpays', 'App\Http\Controllers\StickerpayController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); 
// Route::middleware(['auth:sanctum', 'verified'])->get('/sticker', function () {
//     return view('dash.sticker');
// })->name('sticker'); 

// Route::middleware(['auth:sanctum', 'verified'])->gruop(function () {
//     Route::get('/stickers',Stickers::class);
//     Route::get('/dash', function(){
//         return view('dash');
//     })->name('dash');
// });

// Route::get('/', 'App\Http\Controllers\HomeController@index');

// Route::get('/', function () {
//     return view('auth.login');
// });



// Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
//     return view('dash.index');
// })->name('dash');


