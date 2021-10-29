<?php
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/hasci', 'WelcomeController@index_hasci')->name('hasci-menu');
Route::get('/department', 'WelcomeController@index_dept')->name('front-department');
Route::get('/department/detail/{id}', 'WelcomeController@index_dept_detail')->name('front-department-detail');
Route::get('/about', 'WelcomeController@index_about')->name('front-about');
Route::get('/gallery', 'WelcomeController@index_gallery')->name('front-gallery');
Route::get('/contact', 'WelcomeController@index_contact')->name('front-contact');
Route::post('/contact/send', 'WelcomeController@index_contact_send')->name('front-contact-send');
Route::get('/appointment', 'WelcomeController@index_appointment')->name('front-appointment');
Route::get('/appointment/register/{id}', 'WelcomeController@index_appointment_register')->name('front-appointment-register');
Route::post('/appointment/send', 'WelcomeController@index_appointment_send')->name('front-appointment-send');
Route::get('/blog', 'WelcomeController@index_blog')->name('front-blog');
Route::get('/blog/list/{id}', 'WelcomeController@index_blog_list')->name('front-blog-list');
Route::get('/blog/detail/{id}', 'WelcomeController@index_blog_detail')->name('front-blog-detail');

Auth::routes();
Route::post('/register-normal', 'AuthController@register')->name('register-normal');
Route::post('/register-confirm', 'AuthController@registerConfirm')->name('register-confirm');
Route::post('/login-client', 'AuthController@loginClient')->name('login-client');
Route::post('/change-password', 'AuthController@change_password')->name('change-password');
Route::post('/reset-password', 'AuthController@reset_password')->name('reset-password');
Route::post('/login-sosial', 'AuthController@loginSosial')->name('login-sosial');

// Route::post('/login-normal', 'AuthController@login')->name('login-normal');
Route::group(['middleware' => 'auth'], function(){
		Route::get('/beranda', 'AdminController@index')->name('beranda');
	// Setting
		Route::get('/setting', 'AdminController@setting')->name('setting');
		Route::post('/setting/save', 'AdminController@change_password_admin')->name('setting-save');
	// ---
	// News & Advice
	$post_control = "\App\Modules\Post\Http\Controllers\PostController";
		// GET
		Route::get('/post', "{$post_control}@index")->name('post');
		Route::get('/post/create', "{$post_control}@create")->name('post-create');
		Route::get('/post/{id}/edit', "{$post_control}@edit")->name('post-edit');
		Route::get('/post/view/{id}', "{$post_control}@show")->name('post-view');
		// POST
		Route::post('/post/save', "{$post_control}@store")->name('post-save');
		Route::post('/post/edit/{id}', "{$post_control}@update")->name('post-update');
		// DELETE
		Route::delete('/post/{id}', "{$post_control}@destroy")->name('post-delete');
	// Category
	$category_control = "\App\Modules\Category\Http\Controllers\CategoryController";
		// GET
		Route::get('/category', "{$category_control}@index")->name('category');
		Route::get('/category/create', "{$category_control}@create")->name('category-create');
		Route::get('/category/{id}/edit', "{$category_control}@edit")->name('category-edit');
		// POST
		Route::post('/category/save', "{$category_control}@store")->name('category-save');
		Route::post('/category/edit/{id}', "{$category_control}@update")->name('category-update');
		// DELETE
		Route::delete('/category/{id}', "{$category_control}@destroy")->name('category-delete');
	// ---
	// Doctor
	$doctor_control = "\App\Modules\Doctor\Http\Controllers\DoctorController";
		// GET
		Route::get('/doctor', "{$doctor_control}@index")->name('doctor');
		Route::get('/doctor/{doctor}/edit', "{$doctor_control}@edit")->name('doctor-edit');
		// POST
		Route::post('/doctor/edit/{id}', "{$doctor_control}@update")->name('doctor-update');
	// ---
	// Sub Doctor
	$subdoctor_control = "\App\Modules\Doctor\Http\Controllers\DoctorSubController";
		// GET
		Route::get('/subdoctor', "{$subdoctor_control}@index")->name('subdoctor');
		Route::get('/subdoctor/create', "{$subdoctor_control}@create")->name('subdoctor-create');
		Route::get('/subdoctor/{id}/edit', "{$subdoctor_control}@edit")->name('subdoctor-edit');
		Route::get('/subdoctor/view/{id}', "{$subdoctor_control}@show")->name('subdoctor-view');
		// POST
		Route::post('/subdoctor/save', "{$subdoctor_control}@store")->name('subdoctor-save');
		Route::post('/subdoctor/edit/{subdoctor}', "{$subdoctor_control}@update")->name('subdoctor-update');
		// Delete
		Route::delete('/subdoctor/{id}', "{$subdoctor_control}@destroy")->name('subdoctor-delete');
	// ---
	// Schedule Doctor
	$schedule_doctor_control = "\App\Modules\Doctor\Http\Controllers\DoctorScheduleController";
		// GET
		Route::get('/schedule', "{$schedule_doctor_control}@index")->name('schedule');
		Route::get('/schedule/create', "{$schedule_doctor_control}@create")->name('schedule-create');
		Route::get('/schedule/{id}/edit', "{$schedule_doctor_control}@edit")->name('schedule-edit');
		// POST
		Route::post('/schedule/save', "{$schedule_doctor_control}@store")->name('schedule-save');
		Route::post('/schedule/edit/{id}', "{$schedule_doctor_control}@update")->name('schedule-update');
		// DELETE
		Route::delete('/schedule/{id}', "{$schedule_doctor_control}@destroy")->name('schedule-delete');
	// ---
	// City 
	$city_control = "\App\Modules\City\Http\Controllers\CityController";
		// GET
		Route::get('/city', "{$city_control}@index")->name('city');
		Route::get('/city/create', "{$city_control}@create")->name('city-create');
		Route::get('/city/{id}/edit', "{$city_control}@edit")->name('city-edit');
		// POST
		Route::post('/city/save', "{$city_control}@store")->name('city-save');
		Route::post('/city/edit/{id}', "{$city_control}@update")->name('city-update');
		// DELETE
		Route::delete('/city/{id}', "{$city_control}@destroy")->name('city-delete');
	// ---
	// Client 
	$client_control = "\App\Modules\Client\Http\Controllers\ClientController";
		// GET
		Route::get('/client', "{$client_control}@index")->name('client');
		// Tester Email
		Route::get('/client/create', "{$client_control}@create")->name('client-create');
		// -----------
		Route::get('/client/{id}/edit', "{$client_control}@edit")->name('client-edit');
		Route::get('/client/view/{id}', "{$client_control}@show")->name('client-view');
		// 
		Route::post('/client/edit/{id}', "{$client_control}@update")->name('client-update');
		// DELETE
		Route::delete('/client/{id}', "{$client_control}@destroy")->name('client-delete');
	// ---
	// Service 
	$service_control = "\App\Modules\Service\Http\Controllers\ServiceController";
		// GET
		Route::get('/service', "{$service_control}@index")->name('service');
		Route::get('/service/{service}/edit', "{$service_control}@edit")->name('service-edit');
		// POST
		Route::post('/service/edit/{service}', "{$service_control}@update")->name('service-update');
	// Department
	$dept_control = "\App\Modules\Department\Http\Controllers\DepartmentController";
		// GET
		Route::get('/menu/department/', "{$dept_control}@index")->name('dept');
		Route::get('/department/create', "{$dept_control}@create")->name('dept-create');
		Route::get('/department/{id}/edit', "{$dept_control}@edit")->name('dept-edit');
		// POST
		Route::post('/department/save', "{$dept_control}@store")->name('dept-save');
		Route::post('/department/edit/{id}', "{$dept_control}@update")->name('dept-update');
		// DELETE
		Route::delete('/department/{id}', "{$dept_control}@destroy")->name('dept-delete');
	// ---
	// Sub Service
	$subservice_control = "\App\Modules\Service\Http\Controllers\SubServiceController";
		// GET
		Route::get('/subservice', "{$subservice_control}@index")->name('subservice');
		Route::get('/subservice/create', "{$subservice_control}@create")->name('subservice-create');
		Route::get('/subservice/{id}/edit', "{$subservice_control}@edit")->name('subservice-edit');
		Route::get('/subservice/view/{id}', "{$subservice_control}@show")->name('subservice-view');
		// POST
		Route::post('/subservice/save', "{$subservice_control}@store")->name('subservice-save');
		Route::post('/subservice/update/{id}', "{$subservice_control}@update")->name('subservice-update');
		// DELETE
		Route::delete('/subservice/{id}', "{$subservice_control}@destroy")->name('subservice-delete');
	// ---
	// About
	$about_control = "\App\Modules\About\Http\Controllers\AboutController";
		// GET
		Route::get('/menu/about/', "{$about_control}@index")->name('about');
		Route::get('/about/{id}/edit', "{$about_control}@edit")->name('about-edit');
		// POST
		Route::post('/about/edit/{id}', "{$about_control}@update")->name('about-update');
		// About Partner
			Route::get('/about/upload/', "{$about_control}@upload_partner")->name('about-upload');
			Route::post('/about/upload/', "{$about_control}@upload_store")->name('about-upload-store');
			// EDIT
			Route::post('/about-partner/insert/{id}', "{$about_control}@insert_partner")->name('about-partner-insert');
			Route::post('/about-partner/edit/{id}', "{$about_control}@update_partner")->name('about-partner-update');
			// DELETE
			Route::delete('/about-partner/{id}', "{$about_control}@destroy")->name('about-partner-delete');
	// ---
	// Contact
	$contact_control = "\App\Modules\Contact\Http\Controllers\ContactController";
		// GET
		Route::get('/menu/contact/', "{$contact_control}@index")->name('contact');
		Route::get('/contact/{contact}/edit', "{$contact_control}@edit")->name('contact-edit');
		// POST
		Route::post('/contact/edit/{contact}', "{$contact_control}@update")->name('contact-update');
	// ---
	// Promo
	$promo_control = "\App\Modules\Promo\Http\Controllers\PromoController";
		// GET
		Route::get('/menu/promo', "{$promo_control}@index")->name('promo');
		Route::get('/promo/upload', "{$promo_control}@create")->name('promo-create');
		// POST
		Route::post('/promo/save', "{$promo_control}@store")->name('promo-save');
		// DELETE
		Route::delete('/promo/{id}', "{$promo_control}@destroy")->name('promo-delete');
	// ---
	// Header 
	$header_control = "\App\Modules\Header\Http\Controllers\HeaderController";
		// GET
		Route::get('/menu/header', "{$header_control}@index")->name('header');
		Route::get('/header/{header}/edit', "{$header_control}@edit")->name('header-edit');
		// POST
		Route::post('/header/edit/{header}', "{$header_control}@update")->name('header-update');
	// ---
	// Bottom 
	$bottom_control = "\App\Modules\Bottom\Http\Controllers\BottomController";
		// GET
		Route::get('/menu/bottom', "{$bottom_control}@index")->name('bottom');
		Route::get('/bottom/{bottom}/edit', "{$bottom_control}@edit")->name('bottom-edit');
		// POST
		Route::post('/bottom/edit/{bottom}', "{$bottom_control}@update")->name('bottom-update');
	// Open Hour
	$openhour_control = "\App\Modules\OpenHour\Http\Controllers\OpenHourController";
		// GET
		Route::get('/menu/open/hour', "{$openhour_control}@index")->name('open_hour');
		Route::get('/open/hour/create', "{$openhour_control}@create")->name('open_hour-create');
		Route::get('/open/hour/{id}/edit', "{$openhour_control}@edit")->name('open_hour-edit');
		// POST
		Route::post('/open/hour/save', "{$openhour_control}@store")->name('open_hour-save');
		Route::post('/open/hour/edit/{id}', "{$openhour_control}@update")->name('open_hour-update');
		// DELETE
		Route::delete('/open/hour/{id}', "{$openhour_control}@destroy")->name('open_hour-delete');
	// Sosial Link
	$sosialink_control = "\App\Modules\SosialLink\Http\Controllers\SosialLinkController";
		// GET
		Route::get('/menu/sosial/link', "{$sosialink_control}@index")->name('sosial_link');
		Route::get('/sosial/link/create', "{$sosialink_control}@create")->name('sosial_link-create');
		Route::get('/sosial/link/{id}/edit', "{$sosialink_control}@edit")->name('sosial_link-edit');
		// POST
		Route::post('/sosial/link/save', "{$sosialink_control}@store")->name('sosial_link-save');
		Route::post('/sosial/link/edit/{id}', "{$sosialink_control}@update")->name('sosial_link-update');
		// DELETE
		Route::delete('/sosial/link/{id}', "{$sosialink_control}@destroy")->name('sosial_link-delete');
	// Appointment
	$appointment_control = "\App\Modules\Appointment\Http\Controllers\AppointmentController";
		// GET
		Route::get('/menu/appointment', "{$appointment_control}@index")->name('appointment');
		Route::get('/appointment/create', "{$appointment_control}@create")->name('appointment-create');
		Route::get('/appointment/{id}/edit', "{$appointment_control}@edit")->name('appointment-edit');
		// POST
		Route::post('/appointment/save', "{$appointment_control}@store")->name('appointment-save');
		Route::post('/appointment/edit/{id}', "{$appointment_control}@update")->name('appointment-update');
		// DELETE
		Route::delete('/appointment/{id}', "{$appointment_control}@destroy")->name('appointment-delete');
	// Testimonial
	$testimonial_control = "\App\Modules\Testimonial\Http\Controllers\TestimonialController";
		// GET
		Route::get('/testimonial', "{$testimonial_control}@index")->name('testimonial');
		Route::get('/testimonial/create', "{$testimonial_control}@create")->name('testimonial-create');
		Route::get('/testimonial/{id}/edit', "{$testimonial_control}@edit")->name('testimonial-edit');
		// POST
		Route::post('/testimonial/save', "{$testimonial_control}@store")->name('testimonial-save');
		Route::post('/testimonial/edit/{id}', "{$testimonial_control}@update")->name('testimonial-update');
		// DELETE
		Route::delete('/testimonial/{id}', "{$testimonial_control}@destroy")->name('testimonial-delete');

	// HASCI
		// Header
		$hasci_header_control = "\App\Modules\Hasci\Http\Controllers\HasciHeaderController";
			// GET
			Route::get('/hasci/header', "{$hasci_header_control}@index")->name('hasci-header');
			Route::get('/hasci/header/{id}/edit', "{$hasci_header_control}@edit")->name('hasci-header-edit');
			// POST
			Route::post('/hasci/header/edit/{id}', "{$hasci_header_control}@update")->name('hasci-header-update');
			// DELETE
			Route::delete('/hasci/header/{id}', "{$hasci_header_control}@destroy")->name('hasci-header-delete');
		// Body
		$hasci_body_control = "\App\Modules\Hasci\Http\Controllers\HasciBodyController";
			// GET
			Route::get('/hasci/body', "{$hasci_body_control}@index")->name('hasci-body');
			Route::get('/hasci/body/create', "{$hasci_body_control}@create")->name('hasci-body-create');
			Route::get('/hasci/body/{id}/edit', "{$hasci_body_control}@edit")->name('hasci-body-edit');
			// POST
			Route::post('/hasci/body/save', "{$hasci_body_control}@store")->name('hasci-body-save');
			Route::post('/hasci/body/edit/{id}', "{$hasci_body_control}@update")->name('hasci-body-update');
			// DELETE
			Route::delete('/hasci/body/{id}', "{$hasci_body_control}@destroy")->name('hasci-body-delete');
		// Link
		$hasci_link_control = "\App\Modules\Hasci\Http\Controllers\HasciLinkController";
			// GET
			Route::get('/hasci/link', "{$hasci_link_control}@index")->name('hasci-link');
			Route::get('/hasci/link/create', "{$hasci_link_control}@create")->name('hasci-link-create');
			Route::get('/hasci/link/{id}/edit', "{$hasci_link_control}@edit")->name('hasci-link-edit');
			// POST
			Route::post('/hasci/link/save', "{$hasci_link_control}@store")->name('hasci-link-save');
			Route::post('/hasci/link/edit/{id}', "{$hasci_link_control}@update")->name('hasci-link-update');
			// DELETE
			Route::delete('/hasci/link/{id}', "{$hasci_link_control}@destroy")->name('hasci-link-delete');
		// Metode
		$hasci_metode_control = "\App\Modules\Hasci\Http\Controllers\HasciMetodeController";
			// GET
			Route::get('/hasci/metode', "{$hasci_metode_control}@index")->name('hasci-metode');
			Route::get('/hasci/metode/create', "{$hasci_metode_control}@create")->name('hasci-metode-create');
			Route::get('/hasci/metode/{id}/edit', "{$hasci_metode_control}@edit")->name('hasci-metode-edit');
			// POST
			Route::post('/hasci/metode/save', "{$hasci_metode_control}@store")->name('hasci-metode-save');
			Route::post('/hasci/metode/edit/{id}', "{$hasci_metode_control}@update")->name('hasci-metode-update');
			// DELETE
			Route::delete('/hasci/metode/{id}', "{$hasci_metode_control}@destroy")->name('hasci-metode-delete');
	// ---
	// Facilitie
	$facilitie_control = "\App\Modules\Facilitie\Http\Controllers\FacilitieController";
		// GET
		Route::get('/menu/facilitie', "{$facilitie_control}@index")->name('facilitie');
		Route::get('/facilitie/upload', "{$facilitie_control}@create")->name('facilitie-create');
		// POST
		Route::post('/facilitie/save', "{$facilitie_control}@store")->name('facilitie-save');
		// DELETE
		Route::delete('/facilitie/{id}', "{$facilitie_control}@destroy")->name('facilitie-delete');
});


Route::get('/key',  array('as' => 'install', function($key = null)
{
  Artisan::call('key:generate');
  echo 'done generate key';
}));
Route::get('/config',  array('as' => 'install', function($key = null)
{
  Artisan::call('config:clear');
  echo 'done config clear';
}));
Route::get('/cache',  array('as' => 'install', function($key = null)
{
  Artisan::call('cache:clear');
  echo 'done cache clear';
}));
Route::get('/view',  array('as' => 'install', function($key = null)
{
  Artisan::call('view:clear');
  echo 'done view clear';
}));
Route::get('/route',  array('as' => 'install', function($key = null)
{
  Artisan::call('route:clear');
  echo 'done route clear';
}));
Route::get('/storage',  array('as' => 'install', function($key = null)
{
  Artisan::call('storage:link');
  echo 'done config storage';
}));