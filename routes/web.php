<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
// Route::get('/',function(){
//     return view('err');
// });

Route::get('/', function () {
    if(Auth::check()){
        $user=Auth::user();
        return $user;
    }

});

Route::middleware('auth')->group(function(){

    Route::get('/category',[CategoryController::class,'create']);
    Route::post('/category',[CategoryController::class,'store']);
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('/categories/{id}',[CategoryController::class,'show']);
    Route::post('/categories/{id}',[CategoryController::class,'update']);
    Route::get('/categories/{id}/delete',[CategoryController::class,'destroy']);
    Route::get('/post',[PostController::class,'create']);
    Route::post('/post',[PostController::class,'store']);
    Route::get('/posts',[PostController::class,'index']);
    Route::get('/posts/{id}',[PostController::class,'show']);
    Route::post('/posts/{id}',[PostController::class,'update']);
    Route::get('/posts/{id}/delete',[PostController::class,'destroy']);
    Route::get('/users',[UserCOntroller::class,'index']);
});

Route::get('/register',[UserController::class,'create']);
Route::post('/register',[UserController::class,'store']);
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'check']);

Route::get('/logout',[UserController::class,'logout'])->name('logout');

