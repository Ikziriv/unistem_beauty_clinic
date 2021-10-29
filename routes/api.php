<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Auth API
Route::post('/login-admin', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::post('/register', 'AuthController@register');
Route::post('/register-confirm', 'AuthController@registerConfirm');
// Client
Route::post('/login', 'AuthController@loginClient');
Route::post('/sosial-login', 'AuthController@loginSosialLogin');
Route::post('/change-password', 'AuthController@change_password');
Route::post('/reset-password', 'AuthController@reset_password');
// News & Advice API Get data and show
$post_control = "\App\Modules\Post\Http\Controllers\API\PostController";
	Route::get('/news', "{$post_control}@index");
	Route::get('/news/{post}', "{$post_control}@show");
// City API Get data and show
$city_control = "\App\Modules\City\Http\Controllers\API\CityController";
	Route::get('/city', "{$city_control}@index");
	Route::get('/city/{city}', "{$city_control}@show");
// Contact API Get data and show
$contact_control = "\App\Modules\Contact\Http\Controllers\API\ContactController";
	Route::get('/contact', "{$contact_control}@index");
	Route::get('/contact/{contact}', "{$contact_control}@show");
// Doctor API Get data and show
$doctor_control = "\App\Modules\Doctor\Http\Controllers\API\DoctorController";
	Route::get('/doctor', "{$doctor_control}@index");
	Route::get('/doctor/{doctor}', "{$doctor_control}@show");
// Doctor Schedule API Get data and show
$doctor_schedule_control = "\App\Modules\Doctor\Http\Controllers\API\DoctorScheduleController";
	Route::get('/doctor_schedule', "{$doctor_schedule_control}@index");
	Route::get('/doctor/schedule/{doctor_schedule}', "{$doctor_schedule_control}@show");
// Sub Doctor API Get data and show
$sub_doctor_control = "\App\Modules\Doctor\Http\Controllers\API\SubDoctorController";
	Route::get('/doctor_sub', "{$sub_doctor_control}@index");
	Route::get('/doctor/sub/{subdoctor}', "{$sub_doctor_control}@show");
// Service API Get data and show
$service_control = "\App\Modules\Service\Http\Controllers\API\ServiceController";
	Route::get('/service', "{$service_control}@index");
	Route::get('/service/{service}', "{$service_control}@show");
// Sub Service API Get data and show
$sub_service_control = "\App\Modules\Service\Http\Controllers\API\SubServiceController";
	Route::get('/subservice', "{$sub_service_control}@index");
	Route::get('/subservice/{subservice}', "{$sub_service_control}@show");
// Promo API Get data and show
$promo_control = "\App\Modules\Promo\Http\Controllers\API\PromoController";
	Route::get('/promo', "{$promo_control}@index");
	Route::get('/promo/{promo}', "{$promo_control}@show");
// About API Get data and show
$about_control = "\App\Modules\About\Http\Controllers\API\AboutController";
	Route::get('/about', "{$about_control}@index");
	Route::get('/about/{about}', "{$about_control}@show")->name('about-view');
	// Partner About
	Route::get('/about-partner', "{$about_control}@index_partner");
// Client
$client_control = "\App\Modules\Client\Http\Controllers\API\ClientController";
	Route::get('/client', "{$client_control}@index");
	Route::get('/client/{client}', "{$client_control}@show");
	Route::post('/client/{id}/update', "{$client_control}@update");
