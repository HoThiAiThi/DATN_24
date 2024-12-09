<?php

use App\Http\Controllers\Auth\RegisterLandlordController;
use App\Http\Controllers\Auth\RegisterRenterController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Auth'], function () {
    Route::get('renter', 'RegisterRenterController@index')->name('get.register.renter');
    Route::get('landlord', 'RegisterLandlordController@index')->name('get.register.landlord');
    
    Route::post('/register/nguoi-thue', [RegisterRenterController::class, 'NguoiThue'])->name('register.nguoithue');
    Route::post('/register/chu-tro', [RegisterLandlordController::class, 'ChuTro'])->name('register.chutro');
    //Route::get('', 'RegisterController@index')->name('get.register'); // xoa dong nay thì home chạy mặc định
    Route::get('dang-ky.html', 'RegisterController@index')->name('get.register');
    Route::post('dang-ky.html', 'RegisterController@register')->name('get.register');

    Route::get('dang-nhap.html', 'LoginController@index')->name('get.login');
    Route::post('dang-nhap.html', 'LoginController@login')->name('get.login');

    Route::get('dang-xuat.html', 'LoginController@logout')->name('get.logout');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('admin/login', 'AuthAdminController@login')->name('get_admin.login');
    Route::post('admin/login', 'AuthAdminController@postLogin')->name('post_admin.login');
    Route::get('admin/logout', 'AuthAdminController@logout')->name('get_admin.logout');
});

Route::group(['namespace' => 'Frontend'], function () {
    //Route::get('home', 'HomeController@index')->name('get.home');
    Route::get('/', 'HomeController@index')->name('get.home'); //home chạy mặc định
    Route::get('bang-gia', 'HomeController@getServicePrice')->name('get.service.price');
    Route::get('tim-kiem', 'SearchRoomController@index')->name('get.room.search');
    Route::get('chuyen-muc-{slug}-{maDM}', 'CategoryController@index')
        ->name('get.category.item')
        ->where(['slug' => '[a-z-0-9-]+', 'maDM' => '[0-9]+',]);

    Route::get('room/{slug}-{id}', 'RoomDetailController@detail')
        ->name('get.room.detail')
        ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);
    Route::get('quan-huyen/{slug}-{id}', 'LocationController@getRoomByDistrict')
        ->name('get.room.by_district')
        ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);

    Route::get('phuong-xa/{slug}-{id}', 'LocationController@getRoomByWards')
        ->name('get.room.by_wards')
        ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);


    Route::get('bai-viet', 'BlogController@index')
        ->name('get.blog.index');

    Route::get('bai-viet/{slug}-{id}', 'BlogController@getArticleDetail')
        ->name('get.room.blog_detail')
        ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);
});
Route::get('district', 'User\UserRoomController@loadDistrict')->name('get_user.load.district');
Route::get('wards', 'User\UserRoomController@loadWards')->name('get_user.load.wards');
include 'route_user.php';
include 'route_admin.php';