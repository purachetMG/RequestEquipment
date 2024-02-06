<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EquipmentController;
 
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::group(['middleware' => 'guest'], function () {
    Route::controller(AuthController::class)->group(function(){
        Route::get('/login','login')->name('login');
        Route::post('/login','loginAction')->name('login');
        Route::get('/register','register')->name('register');
        Route::post('/register','registerAction')->name('register');
    });
});



Route::middleware('auth')->group(function(){
    Route::controller(UserController::class)->middleware('user')->group(function(){
        Route::get('/home','index')->name('home');
        Route::get('requestform','requestform')->name('requestform');
        Route::post('sendform','sendform')->name('sendform');
        Route::get('editRequest/{id}','editRequest')->name('editRequest');
        Route::put('updateRequest/{id}','updateRequest')->name('updateRequest');
        Route::delete('deleteRequest/{id}','deleteRequest')->name('deleteRequest');
    });
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout','logout')->name('logout');
    });
    Route::controller(AdminController::class)->middleware('admin')->group(function(){
        Route::get('adminhome','adminhome')->name('adminhome');
        Route::get('userRequest/{id}','userRequest')->name('userRequest');
    });
    Route::controller(EquipmentController::class)->group(function(){
        Route::get('manage','index')->name('managemodel');
        Route::get('create','createmodel')->name('createmodel');
        Route::post('insertmodel','insertmodel')->name('insertmodel');
        Route::get('editmodel/{id}','editmodel')->name('editmodel');
        Route::put('updateModel/{id}','updateModel')->name('updateModel');
        Route::delete('deletemodel/{id}','deletemodel')->name('deletemodel');
    });
});