<?php
use App\Http\Controllers\InstallHelperController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ThemeSettingsContoller;
// My controllers
use App\Http\Controllers\CheckUserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WholesellerController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdmin\AdminController as SuperAdmin_AdminController;
// installer routes
Route::group(['prefix' => 'install',  'middleware' => ['web', 'install', 'isVerified']], function () {
Route::get('/', [InstallHelperController::class, 'getPurchaseCodeVerifyPage'])->name('verify');
Route::post('verify', [InstallHelperController::class, 'verifyPurchaseCode'])->name('verifyPurchaseCode');
});

// redirect to login page
Route::get('/', function () {
return redirect()->route('login');
});

// admin auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('theme-settings', [ThemeSettingsContoller::class, 'settings'])->name('theme-settings');


// Check user for login
Route::post('/check',[CheckUserController::class,'index'])->name('check.user');


// Before superadmin login
Route::group(['prefix' => 'superadmin'], function() {
Route::group(['middleware' => 'superadmin.guest'], function(){
Route::view('/login','superadmin.auth.login')->name('superadmin.login');
Route::post('/login',[SuperAdminController::class, 'authenticate'])->name('superadmin.auth');
});
// After superadmin login
Route::group(['middleware' => 'superadmin.auth'], function(){
Route::get('/dashboard',[SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
Route::get('lang/change', [LanguageController::class, 'change'])->name('changeLang');
Route::get('profile', [SuperAdminController::class,'profilePage'])->name('superadmin.profile');
Route::put('profile/{email}',[SuperAdminController::class,'profileUpdate'])->name('superadmin.profile.update');
// admin routes inside super admin
Route::get('superadmins/admins',[SuperAdmin_AdminController::class,'index'])->name('superadmins.admins.index');
Route::get('superadmins/admins/pdf',[SuperAdmin_AdminController::class,'createPDF'])->name('superadmins.admins.pdf');
Route::get('superadmins/admins/create',[SuperAdmin_AdminController::class,'create'])->name('superadmins.admins.create');
Route::get('superadmins/admins/edit/{id}',[SuperAdmin_AdminController::class,'edit'])->name('superadmins.admins.edit');
Route::get('superadmins/admins/show/{id}',[SuperAdmin_AdminController::class,'show'])->name('superadmins.admins.show');
Route::get('superadmins/admins/status/{id}',[SuperAdmin_AdminController::class,'changeStatus'])->name('superadmins.admins.status');
Route::get('superadmins/admins/delete/{id}',[SuperAdmin_AdminController::class,'destroy'])->name('superadmins.admins.delete');
Route::post('superadmins/admins/store',[SuperAdmin_AdminController::class,'store'])->name('superadmins.admins.store');
Route::put('superadmins/admins/edit/{id}',[SuperAdmin_AdminController::class,'update'])->name('superadmins.admins.update');

Route::get('/users/pdf', 'UserController@createPDF')->name('users.pdf');
Route::resource('users', 'UserController', [
'names' => [
'index' => 'users.index',
'create' => 'users.create',
'store' => 'users.store',
'show' => 'users.show',
'edit' => 'users.edit',
'update' => 'users.update',
]
]);
Route::get('users/{slug}/staus', 'UserController@changeStatus')->name('users.status');
Route::get('users/{id}/delete', 'UserController@destroy')->name('users.delete');


Route::post('/logout',[SuperAdminController::class,'logout'])->name('superadmin.logout');
});
});

// Before admin login
Route::group(['prefix' => 'admin'], function() {
Route::group(['middleware' => 'admin.guest'], function(){
Route::view('/login','admin.auth.login')->name('admin.login');
Route::post('/login',[AdminController::class, 'authenticate'])->name('admin.auth');
});
// After admin login
Route::group(['middleware' => 'admin.auth'], function(){
Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::get('profile', [AdminController::class,'profilePage'])->name('admin.profile');
Route::put('profile/{email}',[AdminController::class,'profileUpdate'])->name('admin.profile.update');

});
});

// Before wholeseller login 
Route::group(['prefix' => 'wholeseller'], function() {
Route::group(['middleware' => 'wholeseller.guest'], function(){
Route::view('/login','wholeseller.auth.login')->name('wholeseller.login');
Route::post('/login',[wholesellerController::class, 'authenticate'])->name('wholeseller.auth');
});

// After wholeseller login
Route::group(['middleware' => 'wholeseller.auth'], function(){
Route::get('/dashboard',[WholesellerController::class, 'dashboard'])->name('wholeseller.dashboard');
Route::get('/logout',[WholesellerController::class,'logout'])->name('wholeseller.logout');
Route::get('profile', [WholesellerController::class,'profilePage'])->name('wholeseller.profile');
Route::put('profile/{email}',[WholesellerController::class,'profileUpdate'])->name('wholeseller.profile.update');
});
});

// Before retailer login
Route::group(['prefix' => 'retailer'], function() {
Route::group(['middleware' => 'retailer.guest'], function(){
Route::view('/login','retailer.auth.login')->name('retailer.login');
Route::post('/login',[RetailerController::class, 'authenticate'])->name('retailer.auth');
});
// After retailer login
Route::group(['middleware' => 'retailer.auth'], function(){
Route::get('/dashboard',[RetailerController::class, 'dashboard'])->name('retailer.dashboard');
Route::get('/logout',[RetailerController::class,'logout'])->name('retailer.logout');
Route::get('profile', [RetailerController::class,'profilePage'])->name('retailer.profile');
Route::put('profile/{email}',[RetailerController::class,'profileUpdate'])->name('retailer.profile.update');
});
});

// Before shopkeeper login
Route::group(['prefix' => 'shopkeeper'], function() {
Route::group(['middleware' => 'shopkeeper.guest'], function(){
Route::view('/login','shopkeeper.auth.login')->name('shopkeeper.login');
Route::post('/login',[ShopkeeperController::class, 'authenticate'])->name('shopkeeper.auth');
});

// After shopkeeper login
Route::group(['middleware' => 'shopkeeper.auth'], function(){
Route::get('/dashboard',[ShopkeeperController::class, 'dashboard'])->name('shopkeeper.dashboard');
Route::get('/logout',[ShopkeeperController::class,'logout'])->name('shopkeeper.logout');
Route::get('profile', [ShopkeeperController::class,'profilePage'])->name('shopkeeper.profile');
Route::put('profile/{email}',[ShopkeeperController::class,'profileUpdate'])->name('shopkeeper.profile.update');
});
});

// Before customer login
Route::group(['prefix' => 'customer'], function() {
Route::group(['middleware' => 'customer.guest'], function(){
Route::view('/login','customer.auth.login')->name('customer.login');
Route::post('/login',[CustomerController::class, 'authenticate'])->name('customer.auth');
});

// After customer login
Route::group(['middleware' => 'customer.auth'], function(){
Route::get('/dashboard',[CustomerController::class, 'dashboard'])->name('customer.dashboard');
Route::get('/logout',[CustomerController::class,'logout'])->name('customer.logout');
Route::get('profile', [CustomerController::class,'profilePage'])->name('customer.profile');
Route::put('profile/{email}',[CustomerController::class,'profileUpdate'])->name('customer.profile.update');
});
});


