<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myActions;
use App\Http\Controllers\Auth;
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

Route::get('/',[myActions::class,'mylists'])->name('homepage');
Route::middleware(['auth'])->group(function (){
    Route::get('/todolist/{id}',[myActions::class,'showToDO'])->name('todolist');
    Route::post('/mynewlist',[myActions::class,'creatNewList'])->name('mynewlist');
    Route::post('/mynewtask',[myActions::class,'saveTasks'])->name('mynewtask');
    Route::post('/isdone',[myActions::class,'isdoneTask'])->name('isdoneTask');
    Route::get('/deltask/{id}',[myActions::class,'delTask'])->name('deltask');
    Route::post('/edit',[myActions::class,'edit'])->name('edittask');
});

Route::get('/pagenotfound',function (){
    return view('layouts.my404');
})->name('/pagenotfound');
Route::get('/logout',[Auth\AuthenticatedSessionController::class,'destroy'])->name('logout');


require __DIR__.'/auth.php';
