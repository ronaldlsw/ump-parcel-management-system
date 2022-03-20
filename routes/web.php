<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\goodsListController;
use App\Http\Controllers\complaintListController;
use App\Http\Controllers\activeListController;
use App\Http\Controllers\CollectListController;
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

Route::any('/register', function() {
    return Redirect::to('/');
});

Route::any('/home', function() {
    return Redirect::to('/');
});

Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to("/login");
});

Auth::routes(['register'=> false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/student', [App\Http\Controllers\HomeController::class, 'studentIndex'])->name('student');
Route::get('/warden', [App\Http\Controllers\HomeController::class, 'wardenIndex'])->name('warden');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin');
Route::get('/officer', [App\Http\Controllers\HomeController::class, 'officerIndex'])->name('officer');

Route::group(['middleware' => ['auth', 'admin']], function() {

    //User List-----------------------------------------------------------
    Route::get('/admin/ul', 'App\Http\Controllers\AdminController@userList');
    Route::get('/admin/ul/report', 'App\Http\Controllers\AdminController@userReport');
    Route::get('/admin/ul/create', 'App\Http\Controllers\AdminController@newUser');
    Route::get('/admin/ul/view/{id}', 'App\Http\Controllers\AdminController@userProfile');
    Route::get('/admin/ul/update/{id}', 'App\Http\Controllers\AdminController@updateUser');

    Route::get('/admin/ul/del/{id}', 'App\Http\Controllers\AdminController@delUser');
    Route::post('/admin/ul/new', 'App\Http\Controllers\AdminController@insertUserProfile');
    Route::post('/admin/ul/{id}', 'App\Http\Controllers\AdminController@updateUserProfile');
    Route::get('/admin/ul/report/qr', 'App\Http\Controllers\AdminController@generateUReportQrCode');

});


Route::group(['middleware' => ['auth', 'activeList']], function() {

    //Active List-----------------------------------------------------
    Route::get('/admin/active-list', [activeListController::class, 'admin_index']);
    Route::post('/admin/active-list', [activeListController::class, 'admin_store']);

    Route::get('/admin/active-list/delete/{id}', [activeListController::class, 'admin_destroy']);

    Route::get('/admin/active-list/show/{p_id}', [activeListController::class, 'admin_show']);
    Route::post('/admin/active-list/update', [activeListController::class, 'admin_update']);

    Route::get('/admin/active-list/create', [activeListController::class, 'admin_create']);
    Route::get('/admin/active-list/report', [activeListController::class, 'admin_report']);
    Route::get('/admin/active-list/updateC/{p_id}', [activeListController::class, 'admin_updateC']);


    //officer-----------------------------------------------------------
    Route::get('/officer/active-list', [activeListController::class, 'officer_index']);
    Route::post('/officer/active-list', [activeListController::class, 'officer_store']);

    Route::get('/officer/active-list/delete/{id}', [activeListController::class, 'officer_destroy']);

    Route::get('/officer/active-list/show/{p_id}', [activeListController::class, 'officer_show']);
    Route::post('/officer/active-list/update', [activeListController::class, 'officer_update']);

    Route::get('/officer/active-list/create', [activeListController::class, 'officer_create']);
    Route::get('/officer/active-list/report', [activeListController::class, 'officer_report']);
    Route::get('/officer/active-list/updateC/{p_id}', [activeListController::class, 'officer_updateC']);
});

Route::group(['middleware' => ['auth', 'collectedList']], function() {

    //Collect List---------------------------------------------------------------
    Route::get('/Collect_list', [CollectListController::class, 'index']);
    Route::get('/Uncollect_list', [CollectListController::class, 'index1']);
    Route::post('/Collect_list', [CollectListController::class, 'store']);

    Route::get('/Collect_list/delete/{id}', [CollectListController::class, 'parceldestroy']);

    //show page
    Route::get('/Collect_list/show/{p_id}', [CollectListController::class, 'show']);
    Route::post('/Collect_list/update', [CollectListController::class, 'update']);

    //create page
    Route::get('/Collect_list/create', [CollectListController::class, 'create']);

    //Uncollected list to collected list
    Route::get('/Collect_list/new/{p_id}', [CollectListController::class, 'new']);

    //Notify Student
    Route::get('/Collect_list/notified/{p_id}', [CollectListController::class, 'notified']);

    //Report page
    Route::get('/Collect_list/statement', [CollectListController::class, 'statement']);

    Route::get('/Collect_list/qrcode', [CollectListController::class, 'qrcode']);

});

Route::group(['middleware' => ['auth', 'goodsList']], function() {
    
    //Goods List---------------------------------------------------------------

    Route::get('/Good-list', 'App\Http\Controllers\goodsListController@index');
    Route::post('/Good-list', 'App\Http\Controllers\goodsListController@store');

    Route::get('/Good-list/delete/{id}', 'App\Http\Controllers\goodsListController@parceldestroy');
    //Route::delete('/Good/{item_id}', [GoodListController::class, 'destroy']);

    //show page
    Route::get('/Good-list/show/{p_id}', 'App\Http\Controllers\goodsListController@show');
    Route::post('/Good-list/update', 'App\Http\Controllers\goodsListController@update');

    //create page
    Route::get('/Good-list/create', 'App\Http\Controllers\goodsListController@create');

    //Report page
    Route::get('/Good-list/report', 'App\Http\Controllers\goodsListController@report');

    //qr page
    Route::get('/Good-list/report/qrcode', 'App\Http\Controllers\goodsListController@qrcode');

    //complain list
    Route::get('/comp_list', [complaintListController::class, 'index']);
    Route::get('/comp_list/show/{c_id}', [complaintListController::class, 'show']);
    //create page
    Route::get('/comp_list/create', [complaintListController::class, 'create']);
    Route::post('/comp_list/update', [complaintListController::class, 'update']);
});


Route::group(['middleware' => ['auth', 'compList']], function() {
    
    //Complain List---------------------------------------------------------------
    Route::get('/comp_list/admin', [complaintListController::class, 'admin']);
    Route::get('/comp_list/officer', [complaintListController::class, 'officer']);

    Route::post('/comp_list', [complaintListController::class, 'store']);

    Route::get('/comp_list/delete/{id}', [complaintListController::class, 'compdestroy']);

    //show page
    Route::get('/comp_list/ashow/{c_id}', [complaintListController::class, 'ashow']);
    Route::get('/comp_list/oshow/{c_id}', [complaintListController::class, 'oshow']);
    
    Route::post('/comp_list/update1', [complaintListController::class, 'update1']);
    Route::post('/comp_list/update2', [complaintListController::class, 'update2']);

    //report
    Route::get('/comp_list/report',[complaintListController::class, 'report']);
    Route::get('/comp_list/oreport',[complaintListController::class, 'oreport']);
    Route::get('/comp_list/qrcode',[complaintListController::class, 'qrcode']);
});
