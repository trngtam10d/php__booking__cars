<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API Category
Route::get('show_category', 'CategoryController@api_show');
Route::post('category', 'CategoryController@api_store');
Route::delete('delete_category/{id}', 'CategoryController@api_delete');
Route::put('update_category/{id}', 'CategoryController@api_update');

// Locations
Route::post('location', 'LocationController@api_store');
Route::put('update-location/{id}', 'LocationController@api_update');
Route::delete('update-location/{id}', 'LocationController@apiDelete');
Route::get('show_location', 'LocationController@api_show');

// Reders
Route::post('reder', 'RederController@apiStore');
Route::put('update-reder/{id}', 'RederController@apiUpdate');
Route::delete('update-reder/{id}', 'RederController@apiDelete');
Route::get('reder', 'RederController@apiShow');

//API Banner
Route::get('show_banner', 'BannerController@api_show');
Route::post('banner', 'BannerController@api_store');
Route::delete('delete_banner/{id}', 'BannerController@api_delete');
Route::post('update_banner/{id}', 'BannerController@api_update');

// User
Route::put('update-user/{id}', 'UserController@apiUpdate');
Route::delete('update-user/{id}', 'UserController@apiDelete');
Route::get('user', 'UserController@apiShow');

// Review
Route::post('review', 'RateController@apiStore');
// Route::delete('update-review/{id}', 'Re@apiDelete');
Route::get('review', 'RateController@apiShow');
Route::put('update_reply/{id}', 'RateController@apiUpdate');

// Booking
Route::post('booking', 'BookingController@apiStore');
// Route::delete('update-review/{id}', 'Re@apiDelete');
Route::get('booking', 'BookingController@apiShow');
Route::put('update_booking/{id}', 'BookingController@apiUpdate');

// Wishlist 
Route::get('wishlist', 'WishlistController@apiShow');
// Oder 
Route::get('oder', 'OderController@apiShow');
//API car
Route::get('dasbroad', 'CarController@api_show');
Route::post('dasbroad', 'CarController@api_store');
Route::delete('delete_car/{id}', 'CarController@api_delete');
Route::post('update_car/{id}', 'CarController@api_update');

//API comment
Route::get('show_comment', 'CommentController@api_show');
Route::post('comment', 'CommentController@api_store');
Route::delete('delete_comment/{id}', 'CommentController@api_delete');
//API history
Route::get('show_history', 'HistoryController@api_show');
Route::post('history', 'HistoryController@api_store');
Route::delete('delete_history/{id}', 'HistoryController@api_delete');

//API contact
Route::get('show_contact', 'ContactController@api_show');
Route::post('contact', 'ContactController@api_store');
Route::delete('delete_contact/{id}', 'ContactController@api_delete');
Route::post('update_contact/{id}', 'ContactController@api_update');

//API Sale
Route::get('show_sale', 'SaleController@api_show');
Route::post('sale', 'SaleController@api_store');
Route::delete('delete_sale/{id}', 'SaleController@api_delete');


// District
Route::post('district', 'DistriController@apiStore');
Route::post('update-district/{id}', 'DistriController@apiUpdate');
Route::delete('update-district/{id}', 'DistriController@apiDelete');
Route::get('district', 'DistriController@apiShow');




Route::get('home', 'PageController@pagehome');

// Hiển thị lịch sử thanh toán : 
Route::get('history' , 'APIYotripController@getAPIHistory');
// Tìm kiếm xe :\
Route::get('search-cars-location', 'APIYotripController@getAPISortCar');
// Tìm kiếm xe theo khu vực và thời gian :\
Route::get('search-cars-location-time', 'APIYotripController@getAPILotionCars');
// Chương trình giới thiệu : 
Route::get('invite', 'APIYotripController@getAPIInvite');
// danh sách mã khuyến mãi: 
Route::get('coupon' , 'APIYotripController@getAPICoupny');
// Tìm kiếm mã khuyến mãi :
Route::get('search-coupon-key' , 'APIYotripController@getAPISearchCoupon');

// Thêm xe vào danh sách yêu thích:
Route::get('wishlist/show', 'APIYotripController@getAPIShowWishList');
Route::get('wishlist/add/{id}' , 'APIYotripController@getAPIAddWishlist');
Route::get('wishlist/remove/{id}', 'APIYotripController@getAPIRemoveWishList');

// Thay đổi mật khẩu : 
Route::get('changepassword/user', 'APIYotripController@getAPIChangeUserPassword');
Route::post('changepassword/user/save', 'APIYotripController@changPasswordStore');

// Danh sách xe : 
Route::get('get-cars-list', 'APIYotripController@getAPICars');
// Danh sách tự lái : 
Route::get('get-cars-driving-list', 'APIYotripController@getAPIDriving');
// Danh sách có tài xế : 
Route::get('get-cars-drive-list', 'APIYotripController@getAPIDrive');
// Chi tiết xe : 
Route::get('get-cars-list/{id}', 'APIYotripController@getAPICarsID');
// Hiển thị bảng giá khi hiển thị chi tiết :
Route::get('get-cars-table-cost-date/{id}', 'APIYotripController@getAPITableCars');


// Danh sách khu vực: 
Route::get('get-location-cars-list', 'APIYotripController@getAPILocation');
// liệt kê Xe theo khu vực:
Route::get('get-location-cars-list/{id}', 'APIYotripController@getAPILocationID');
// Quận , huyện liên kết với khu vực:
Route::get('get-location-district-list', 'APIYotripController@getAPIDistrict');

// Danh sách hãng xe: 
Route::get('get-renders-cars-list', 'APIYotripController@getAPIRenders');

// liêt kệ xe theo loại chỗ ngồi của xe : 
Route::get('get-seats-cars-list', 'APIYotripController@getAPISeats');

// hiển thị banners trang yotrip: 
Route::get('get-banner-yotrip-status', 'APIYotripController@getAPIBanners');

// hiển thị đánh giá: 
Route::get('get-cars-review-detail', 'APIYotripController@getAPIReview');

// Booking : 
Route::get('get-cars-booking-detail', 'APIYotripController@getAPIBooking');
Route::get('get-cars-booking-detail/{id}', 'APIYotripController@getAPIBookings');
// Lấy mã khuyến mãi cho phương thức thuê xe : 
Route::get('get-cars-booking-coupon', 'APIYotripController@getAPICouponBooking');

// Profile : 
Route::get('get-user-profile-account/{id}', 'APIYotripController@getAPIProfile');
// Đăng xuất : 
Route::get('get-user-logout-yotrip', 'APIYotripController@getAPILogout');
