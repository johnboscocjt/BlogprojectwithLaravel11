<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });
//if not admin redirect to this route, for users, use the named route dashboard which i defined it
Route::get('/home', [HomeController::class,'homepage'])->middleware(['auth', 'verified'])->name('dashboard'); // / is a root, also this is a named route.user
Route::get('/', [HomeController::class,'homepage']);//for everyone , no need to login

//authenticatedsessioncontroller->if not user direct user to the route called dashboard.



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard'); //comment out

// Route::get('/home', [HomeController::class,'index'])->middleware('auth')->name('home');//admin home

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/post_page', [AdminController::class,'post_page']);

//created route for admin ,when user is admin will be taken to this route, use the middleware
route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth', 'admin']);//admin frommiddleware

Route::post('/add_post', [AdminController::class,'add_post']);

Route::get('/show_post', [AdminController::class,'show_post']);

Route::get('/delete_post/{id}', [AdminController::class,'delete_post']);

Route::get('/edit_page/{id}', [AdminController::class,'edit_page']);

Route::post('/update_post/{id}', [AdminController::class,'update_post']);

Route::get('/post_details/{id}', [HomeController::class,'post_details']);

Route::get('/create_post', [HomeController::class,'create_post'])->middleware('auth');//prevent unlogged in user

Route::post('/user_post', [HomeController::class,'user_post'])->middleware('auth');

Route::get('/my_post', [HomeController::class,'my_post'])->middleware('auth');

Route::get('/my_post_del/{id}', [HomeController::class,'my_post_del'])->middleware('auth');

Route::get('/post_update_page/{id}', [HomeController::class,'post_update_page'])->middleware('auth');

Route::post('/update_post_data/{id}', [HomeController::class,'update_post_data'])->middleware('auth');

Route::get('/accept_post/{id}', [AdminController::class,'accept_post']);

Route::get('/reject_post/{id}', [AdminController::class,'reject_post']);