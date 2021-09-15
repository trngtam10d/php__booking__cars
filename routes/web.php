<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

// phần giới thiệu : 
Route::get('/referral' , 'PageController@getReffect')->name('referral');


Route::get('/' , 'PageController@pagehome')->name('home');

// page about 
Route::get('/about' , 'PageController@pageAbout')->name('about');
// page service 
Route::get('/service' , 'PageController@pageService')->name('service');
// page cars 
Route::get('/car' , 'PageController@pageCar')->name('car');
Route::get('car/{id}', 'PageController@getCarbookID')->name('car.detail');
Route::get('search', 'PageController@sortCar')->name('sort');
Route::get('car/location/{id}', 'PageController@getRenderCarById')->name('car.location');


// Bookings car
Route::get('choose-time/{id}', 'PageController@getBookings')->name('car.booking')->middleware('checkLogin');
Route::post('payment/{id}', 'PageController@getPayment')->name('car.payment');
Route::post('payment-book/{id}', 'PageController@Payment')->name('car.paymentbook');

//Sort location car
Route::get('search-car', 'PageController@sortLocationCar')->name('search.car');

// page contact 
Route::get('/contacts' , 'PageController@pageContact')->name('contacts');
Route::post('/contact/save', 'PageController@saveContact')->name('contact.save');


// danh sách yêu thích
Route::get('wishlist/show', 'PageController@showWishList')->name('wishlist')->middleware('checkLogin');
Route::get('wishlist/add/{id}', 'PageController@addWishList')->name('wishlist.add')->middleware('checkLogin');
Route::get('wishlist/remove/{id}', 'PageController@removeWishList')->name('wishlist.remove');

// Mã khuyến mãi : 
Route::get('coupon/show' , 'PageController@getCoupny')->name('coupon')->middleware('checkLogin');
Route::get('coupon/search/key', 'PageController@couponSearch')->name('coupon.search');


// Hóa đơn thuê xe : 
Route::get('receipt/show' , 'PageController@getInvoice')->name('receipt')->middleware('checkLogin');
//Lịch sử giao dịch:
Route::get('history/show' , 'PageController@getHistory')->name('history')->middleware('checkLogin');

// Login google
Route::get('auth/google', 'AdminController@redirectToGoogle');
Route::get('auth/google/callback', 'AdminController@handleGoogleCallback');

//Login with facebook
Route::get('/getInfo-facebook/{social}', 'SocialController@getInfo');
Route::get('/check-info-facebook/{social}', 'SocialController@checkInfo');


//-----------------Backend (ADMIN) route group start-------------------
Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {
    // Admin 


    Route::get('/admin' , 'AdminController@admin')->name('admin')->middleware('checkRole:admin/mod');
 

    
    /* Locations */
    Route::resource('location' , 'LocationsController')->middleware('checkRole:admin/mod');

    /* Reders */
    Route::resource('reder' , 'RederController')->middleware('checkRole:admin');
    /* Category */
    Route::resource('category' , 'CategoryController')->middleware('checkRole:admin');
    /* Banner */
    Route::resource('banner' , 'BannerController')->middleware('checkRole:admin');
    /* User */
    Route::resource('user' , 'UserController')->middleware('checkRole:admin');
    /* Review */
    Route::resource('review' , 'RateController')->middleware('checkRole:admin/mod');

    /* Bookings */
    Route::resource('booking' , 'BookingController')->middleware('checkRole:admin/mod');
 
    /* Wishlist */
    Route::resource('oder' , 'OderController')->middleware('checkRole:admin/mod');

    //Car
    Route::resource('main-content', 'CarController')->middleware('checkRole:admin/mod');

    //Comment
    Route::resource('comment', 'CommentController')->middleware('checkRole:admin/mod');
    //History
    Route::resource('history', 'HistoryController')->middleware('checkRole:admin/mod');

    //Contact
    Route::resource('contact', 'ContactController')->middleware('checkRole:admin');
    //Sale
    Route::resource('sale', 'SaleController')->middleware('checkRole:admin');
    //district
    Route::resource('district', 'DistriController')->middleware('checkRole:admin/mod');

     /* Wishlist */
     Route::resource('wishlist' , 'WishlistController')->middleware('checkRole:admin');
    // //Admin profile
    // Route::get('profile', 'AdminController@profile')->name('admin.profile')->middleware('checkRole:admin'); //mod
    //Update profile
    Route::get('/profile/{id}', 'AdminController@profile')->name('admin.profile');
    // Route::get('/changepassword', 'PageController@changePassword')->name('admin.change.password');
    // Route::post('/changepassword/save', 'UserController@changPasswordStore')->name('admin.changepass.save');
 
});
//--------------------End backend route group---------------------
//---------------------User route group start---------------------
Route::group(['prefix' => '/ui'], function () {
    Route::post('/otp', 'PageController@userSubmitOTP')->name('registerotp');

    Route::patch('edit-profile/{id}','UserController@editUser')->name('editUser');

    Route::get('/profile/{id}', 'PageController@getProfile')->name('user.profile');

    //User Login
    Route::get('/login', 'PageController@userLogin')->name('user.login');
    Route::post('/login', 'PageController@userLoginSubmit')->name('user.login.submit');

    //User Register
    Route::get('/register', 'PageController@userRegister')->name('user.register');
    Route::post('/register', 'PageController@userRegisterSubmit')->name('user.register.submit');

    // ref : chương trình giới thiệu 
    Route::get('/register/ref/{ref}', 'PageController@userRegisterRef')->name('user.register.ref');
    //User Logout
    Route::get('/logout', 'PageController@userLogout')->name('user.logout');
    
    //User change password
    Route::get('/changepassword', 'PageController@changeUserPassword')->name('user.change.password');
    Route::post('/changepassword/save', 'UserController@changPasswordStore')->name('user.changepass.save');

   

    // Payment 
    Route::post('payment/online/{id}','PageController@createPayment')->name('payment.online');
    Route::get('payment/return','PageController@vnpayreturn')->name('vnpay.return');

   
    
});
//---------------------End user route group-----------------------
//Cars Rate
Route::post('rate', 'RateController@store')->name('rate.add')->middleware('checkLogin');












