<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\userController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\userDetailController;

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
    Route::group(['middleware' => 'isActive'], function () {
    
        Route::get('/', function () {return view('index');});
        Route::get('/index', function () {return view('index');});
        
        Route::group(['middleware' => 'user'], function () {
            Route::get('/profile', [userDetailController::class, 'index']);
            Route::get('/addParent', [userDetailController::class, 'addParent'])->name('parent.form');
            Route::post('parent/create', [userDetailController::class, 'createParent'])->name('parent.create');
            Route::post('/insertchild', [ChildController::class, 'insertChild'])->name('child.insert');
            Route::post('/insertfee', [FeesController::class, 'insertFee'])->name('fee.insert');
            Route::get('/addchild/{id}', [ChildController::class, 'addChild'])->name('child.form');
            Route::get('/addfee/{id}', [ChildController::class, 'addFee'])->name('fees.form');
            Route::get('/enablechild/{id}', [ChildController::class, 'enableChild'])->name('index');
            Route::get('/profile', [userDetailController::class, 'index']);

            Route::get('/deletechild/{id}', [ChildController::class, 'deleteChild'])->name('index');
            Route::get('/addDonation', [PayController::class, 'addDonation']);
            Route::get('/editchild', [ChildController::class, 'editChild']);
            Route::get('/addFee', [PayController::class, 'addFee']);
        });

        Route::group(['middleware' => 'doner'], function () {
            // Route::get('/addDonation', [PayController::class, 'addDonation']);
            // Route::get('/profile', [userDetailController::class, 'index']);
            Route::get('/DonerProfile', [userDetailController::class, 'index']);
        });

        Route::group(['middleware' => 'admin'], function () {
            Route::get('/parents', [ParentController::class, 'index']);
            Route::get('/authUsers', [userController::class, 'index']);
            Route::get('/unauthUsers', [userController::class, 'unauthorizedUsers']);
            Route::get('/enableUnauthUsers/{id}', [userController::class, 'activateUnauthorizedUsers']);
            Route::get('/deleteUnauthUsers/{id}', [userController::class, 'deleteUnauthorizedUsers']);
            Route::get('/authUsers', [userController::class, 'authorizedUsers']);
            Route::get('/disableAuthUsers/{id}', [userController::class, 'deactivateAuthorizedUsers']);
        });
    });
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('register', [RegisterController::class, 'index'])->name('register-user');
Route::post('custom-registration', [RegisterController::class, 'customRegistration'])->name('register.custom'); 
Route::get('logout', [LoginController:: class, 'logout']);

// Route::get('/addParent', [ParentController::class, 'addParent'])->name('parent.index');
// Route::get('/register', [RegisterController::class, 'index']);
// Route::get('/login', [LoginController::class, 'index']);
// Route::get('/profile', [ParentController::class, 'profile']);
// Route::post('parent/create', [ParentController::class, 'createParent'])->name('parent.create');
// Route::get('/addchild', [ChildController::class, 'addChild']);
// Route::get('/editchild', [ChildController::class, 'editChild']);
// Route::get('/addDonation', [PayController::class, 'addDonation']);
// Route::get('/addFee', [PayController::class, 'addFee']);
