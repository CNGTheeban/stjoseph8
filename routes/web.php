<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\PayController;

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
Route::group(['middleware' => 'auth.check'], function () {
    //Your protected routes here
    
    Route::get('/', function () {
        return view('index');   
    });
    
    Route::group(['middleware' => 'parent'], function () {
        Route::get('/profile', [ParentController::class, 'profile']);
        Route::get('/addParent', [ParentController::class, 'addParent']);
        Route::post('parent/create', [ParentController::class, 'createParent'])->name('parent.create');
        Route::get('/addchild', [ChildController::class, 'addChild']);
        Route::get('/editchild', [ChildController::class, 'editChild']);
        Route::get('/addFee', [PayController::class, 'addFee']);
    });

    Route::group(['middleware' => 'doner'], function () {
        Route::get('/addDonation', [PayController::class, 'addDonation']);
    });

    Route::group(['middleware' => 'admin'], function () {
        
    });
});


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('register', [RegisterController::class, 'index'])->name('register-user');
Route::post('custom-registration', [RegisterController::class, 'customRegistration'])->name('register.custom'); 


// Route::get('/addParent', [ParentController::class, 'addParent'])->name('parent.index');
// Route::get('/register', [RegisterController::class, 'index']);
// Route::get('/login', [LoginController::class, 'index']);
// Route::get('/profile', [ParentController::class, 'profile']);
// Route::post('parent/create', [ParentController::class, 'createParent'])->name('parent.create');
// Route::get('/addchild', [ChildController::class, 'addChild']);
// Route::get('/editchild', [ChildController::class, 'editChild']);
// Route::get('/addDonation', [PayController::class, 'addDonation']);
// Route::get('/addFee', [PayController::class, 'addFee']);
