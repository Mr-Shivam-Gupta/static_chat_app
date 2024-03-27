<?php

use App\Http\Controllers\chatContoller;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [chatContoller::class, 'index']);
Route::post('/messages', [chatContoller::class, 'messages'])->name('messages');
