<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Products;
use App\User;
use App\Bills;
use App\BillDetail;
use App\Brands;
use App\Blogs;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

//lỗi 404
Route::get('404', 'PageController@get404');

//trang chủ
Route::get('trangchu', 'PageController@getIndex');

//trang checkout
Route::get('checkout', 'PageController@getCheckOut');
Route::post('checkout', 'PageController@postCheckOut');

Route::get('checkoutInfo', 'PageController@getCheckOutInfo');
Route::post('checkoutInfo', 'PageController@postCheckOutInfo');

//trang sản phẩm
Route::get('product', 'PageController@getProduct');

//about
Route::get('about', 'PageController@getAbout');

//services
Route::get('services', 'PageController@getServices');

//portfolio
Route::get('portfolio', 'PageController@getPortfolio');

//contact
Route::get('contact', 'PageController@getContact');
Route::post('contact', 'PageController@postContact');

//blog
Route::get('blog', 'PageController@getBlog');

//đăng ký Customer
Route::get('signup', 'PageController@getSignUp');
Route::post('signup', 'PageController@postSignUp');

//đăng nhập Customer
Route::get('login', 'PageController@getLogin');
Route::post('login', 'PageController@postLogin');

//đăng xuất Customer
Route::get('logout', 'PageController@getLogout');

//Sửa thông tin Customer
Route::get('edit', 'PageController@getEdit');
Route::post('edit', 'PageController@postEdit');

// Route::get('mail', 'PageController@getMail');
// Route::post('mail', 'PageController@postMail');

//thêm sản phẩm và giỏ
Route::get('add_to_cart/{id}',[
    'as'=> 'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);

//xóa sản phẩm khỏi giỏ
Route::get('del_cart/{id}',[
    'as'=> 'xoagiohang',
    'uses'=>'PageController@getDelItemCart'
]);

//tìm kiếm
Route::match(['get', 'post'], 'search','PageController@search');


//đăng nhập Admin
Route::get('admin/login', 'UserController@getLoginAdmin');
Route::post('admin/login', 'UserController@postLoginAdmin');

//đăng xuất Admin
Route::get('admin/logout', 'UserController@getLogout');

//đăng ký Admin
Route::get('admin/signup', 'UserController@getSignUpAdmin');
Route::post('admin/signup', 'UserController@postSignUpAdmin');

Route::get('admin/dashboard', 'UserController@getDashboard');
Route::post('admin/dashboard', 'UserController@postDashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () 
{
    Route::group(['prefix' => 'products'], function () {
        Route::get('list', 'ProductsController@getIndex');
        Route::get('edit/{id}', 'ProductsController@getEdit');
        Route::post('edit/{id}', 'ProductsController@postEdit');

        Route::get('add', 'ProductsController@getAdd');
        Route::post('add', 'ProductsController@postAdd');

        Route::get('delete/{id}', 'ProductsController@getDelete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('list', 'UserController@getIndex');
        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');
        Route::get('delete/{id}', 'UserController@getDetete');
    });

    Route::group(['prefix' => 'bills'], function () {
        Route::get('list', 'BillsController@getIndex');
        Route::get('bill_detail/{id}', 'BillsController@getDetail');
    });

    Route::group(['prefix' => 'blogs'], function () {
        Route::get('list', 'BlogsController@getIndex');
        Route::get('edit/{id}', 'BlogsController@getEdit');
        Route::post('edit/{id}', 'BlogsController@postEdit');

        Route::get('add', 'BlogsController@getAdd');
        Route::post('add', 'BlogsController@postAdd');

        Route::get('delete/{id}', 'BlogsController@getDelete');
    });

    Route::group(['prefix' => 'brands'], function () {
        Route::get('list', 'BrandsController@getIndex');
        Route::get('edit/{id}', 'BrandsController@getEdit');
        Route::post('edit/{id}', 'BrandsController@postEdit');

        Route::get('add', 'BrandsController@getAdd');
        Route::post('add', 'BrandsController@postAdd');

        Route::get('delete/{id}', 'BrandsController@getDelete');
    });
});