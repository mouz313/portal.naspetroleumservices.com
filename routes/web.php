<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\StripePaymentController;

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

// ---------------------------------------
Route::controller(StripePaymentController::class)->group(function(){

    Route::get('stripe', 'stripe');

    Route::post('stripe', 'stripePost')->name('stripe.post');

});

Route::get('/cache/clear', [HomeController::class, 'cacheClear'])->name('front.cache.clear');

// ---------------------------------------
Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::middleware(['auth', 'user-role:0'])->group(function () {
    Route::get("/home", [HomeController::class, 'userHome'])->name("home");

    // ---------------------User View--------------------
    Route::get('user.dashboard', [HomeController::class, 'userHome'])->name('user.dashboard');
    Route::get('/user/shop', [ShopController::class, 'usershop'])->name('usershop');
    Route::get('/user/store/view/{id}', [HomeController::class, 'userstore'])->name('userstore');
    Route::get('user/edit/profile/', [HomeController::class, 'userprofile'])->name('userprofile');
    Route::get('/user/Report/{fileName}', [ShopController::class, 'download_file'])->name('download_file_user');
    Route::POST('/user/password/change', [UserController::class, 'adminpassword'])->name('userpassword');
    Route::POST('user/update', [HomeController::class, 'updateprofile'])->name('userupdate');
    Route::POST('/user/Test/Report', [ShopController::class, 'test_report'])->name('user_test_report');
    Route::get('user/store/downloadable/{id}', [UserController::class, 'storedownloadableview'])->name('userdownloadablefile');
    Route::get('user/download/Report/{fileName}', [ShopController::class, 'download_file'])->name('user_download_file');
    Route::get('user/required/document/{fileName}', [ShopController::class, 'download_required_document'])->name('user_download_required_document');
});
// Route Editor
Route::middleware(['auth', 'user-role:1'])->group(function () {
    Route::get("/manager/home", [HomeController::class, 'adminHome'])->name("manager.home");
    // -------------------Shop-----------------
    Route::get('/manager/profile/editing', [UserController::class, 'manager_profile_show'])->name('manager.edit_profile');
    Route::post('/manager/profile/update', [UserController::class, 'manager_profile_update'])->name('manager.update_profile');
    Route::POST('/manager/password/change', [UserController::class, 'managerpassword'])->name('managerpassword');

    Route::get('/manager/shop', [ShopController::class, 'index'])->name('managershop');
    Route::get('/manager/add/shop/{id}', [ShopController::class, 'add'])->name('manageradd');
    Route::post('/manager/add/shop/store', [ShopController::class, 'store'])->name('manager.shop.store');
    Route::get('/admin/doc/Report/{fileName}', [ShopController::class, 'download_nov'])->name('download_file_nov');
    Route::post('/manager/delete/{id}', [UserController::class, 'destroy'])->name('manager.delete');
    Route::get('manager/edit/{id}', [UserController::class, 'edit'])->name('manager.edit');
    Route::get('manager/view/{id}', [UserController::class, 'view'])->name('manager.view');
    Route::POST('manager/update', [UserController::class, 'update'])->name('manager.update');
    Route::get('manager/add/shop/{id}', [ShopController::class, 'add'])->name('manager.add');
    Route::get('/manager/store/view/{id}', [HomeController::class, 'storeview'])->name('manager.storeview');
    Route::get('manager/shop', [ShopController::class, 'index'])->name('manager.shop');
    Route::get('/manager/users', [UserController::class, 'allusers'])->name('manager.users');
    Route::get('manager/edit/shop/{id}', [ShopController::class, 'shop_edit'])->name('manager.shop.edit');
    Route::post('manager/update/shop', [ShopController::class, 'shop_update'])->name('manager.shop.update');
    Route::post('/manager/shop/delete/{id}', [UserController::class, 'destroy_shop'])->name('manager.delete.shop');
    Route::get('/managers/edit/profile/', [HomeController::class, 'managerprofile'])->name('manager.editprofile');
    Route::post('manager/edit/profile/update', [UserController::class, 'managerprofileupdate'])->name('manager.editprofileupdate');

    // -------------------Shop-----------------


    Route::get('/store/view/{id}', [HomeController::class, 'storeview'])->name('storeview');
});
// Route Admin
Route::middleware(['auth', 'user-role:2'])->group(function () {


    Route::get('/reminders/{id}', [ReminderController::class, 'index'])->name('reminders.index');
    Route::post('/reminders', [ReminderController::class, 'store'])->name('reminders.store');
    Route::get('/admin/reminders/list', [ReminderController::class, 'list'])->name('reminders.list');
    Route::post('/reminders/list/{id}', [ReminderController::class, 'destroy'])->name('destroy');

    Route::get("/admin/home", [HomeController::class, 'adminHome'])->name("admin.home");
    Route::get('admin/edit/profile/', [HomeController::class, 'editprofile'])->name('editprofile');
    Route::get('/store/downloadable/files/{id}', [ShopController::class, 'storedownloadableview'])->name('downloadablefile');
    Route::get('/user/register', [UserController::class, 'showRegisterForm'])->name('user.show.register');
    Route::get('/users', [UserController::class, 'allusers'])->name('users');
    Route::post('/user/register', [UserController::class, 'registerUser'])->name('new.users.register');
    Route::post('/manager/register', [UserController::class, 'registerUser'])->name('new.manager.register');
    Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::post('/Shop/delete/{id}', [UserController::class, 'destroy_shop'])->name('delete.shop');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::get('/view/{id}', [UserController::class, 'view'])->name('view');
    Route::POST('/update', [UserController::class, 'update'])->name('update');
    Route::POST('/update/store/data', [ShopController::class, 'test_report'])->name('update_store_data');
    Route::get('/download/Report/{fileName}', [ShopController::class, 'download_file'])->name('download_file');
    Route::POST('/admin/password/change', [UserController::class, 'adminpassword'])->name('adminpassword');
    Route::POST('/admin/update', [HomeController::class, 'updateprofile'])->name('adminupdate');

    // -------------------Shop-----------------
    Route::get('shop', [ShopController::class, 'index'])->name('shop');
    Route::get('add/shop/{id}', [ShopController::class, 'add'])->name('add');
    Route::post('add/shop/store', [ShopController::class, 'store'])->name('shop.store');
    Route::get('required/document/{fileName}', [ShopController::class, 'download_required_document'])->name('download_required_document');
    Route::get('edit/shop/{id}', [ShopController::class, 'shop_edit'])->name('shop.edit');
    Route::post('update/shop', [ShopController::class, 'shop_update'])->name('shop.update');
    Route::get('/store/view/{id}', [HomeController::class, 'storeview'])->name('storeview');

    // -----------------------shop end-----------------------

    // -----------------------Manager-----------------------

    Route::get('/manager/all', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('/Add/Manager', [ManagerController::class, 'form'])->name('addmanager');
});
