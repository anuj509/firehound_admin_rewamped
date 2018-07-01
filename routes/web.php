<?php

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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/', 'HomeController@index');
Route::post('/login','CustomerController@getlogin');
Route::post('/register','CustomerController@store');
Route::post('/reset','CustomerController@reset');
Route::get('/reset/password/{token}','CustomerController@resetRedirect');
Route::get('/reset/password','CustomerController@resetRedirectReq');
Route::post('/reset/password','CustomerController@resetPassword')->name('customer.password.request');
Route::get('/logout','CustomerController@getlogout');
Route::post('/companydetails','CustomerController@companydetails');
//Route::post('/categorydetails','CustomerController@categorydetails');
// Route::get('/checkloginstatus','HomeController@navrightitem');
// Route::get('/checkpackagesstatus','HomeController@userpackages');
// Route::get('/getstates','HomeController@getstates');
// Route::get('/getmarketplaces','HomeController@getmarketplaces');
// Route::get('/getmonthlysales','HomeController@getmonthlysales');
// Route::get('/getfulfillments','HomeController@getfulfillments');
// Route::get('/getcategoriesdeals','HomeController@getcategoriesdeals');

// Route::get('/me','CustomerController@myspace');
// Route::get('/profile','MySpaceController@profile');
// Route::get('/blogs','MySpaceController@blogs');
// Route::get('/getblog/{id}','MySpaceController@blog');
// Route::get('/guides','MySpaceController@guides');
// Route::get('/guides/{id}','MySpaceController@showguide');
// Route::get('/tickets','MySpaceController@tickets');
// Route::post('/tickets/save','MySpaceController@storeTicket')->name('ticket.save');
// Route::post('/verifycontact','MySpaceController@verifyContact');
// Route::post('/verifyotp','MySpaceController@verifyOTP');
// Route::get('/packages','MySpaceController@packages');


// Route::post('/update/register/{id}','CustomerController@updateregister');
// Route::post('/update/companydetails/{id}','CustomerController@updatecompanydetails');
// //Route::post('/update/categorydetails/{id}','CustomerController@updatecategorydetails');
// Route::post('/buy','PaymentController@buy');
// Route::get('/redirect','PaymentController@redirect');
// Route::post('/webhook/','PaymentController@webhook');
// Route::get('/globalsearch','MySpaceController@globalSearch');

Route::group(['prefix' => 'admin'], function () { 
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');
  Route::get('/home','Admin\AdminController@dashboard')->name('home');
  // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  // Route::post('/register', 'AdminAuth\RegisterController@register');
  Route::get('/getperms', 'Admin\AdminController@getPermissions')->name('getperms');
  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
  Route::get('/sliders','Admin\SliderController@index')->name('sliders.index');
  Route::post('/sliders','Admin\SliderController@store')->name('sliders.save');
  Route::get('/sliders/{id}','Admin\SliderController@edit');
  Route::post('/sliders/{id}/update','Admin\SliderController@update');
  Route::get('/sliders/{id}/destroy','Admin\SliderController@destroy');
  Route::get('/admins','Admin\AdminController@index')->name('admins.index');
  Route::get('/admins/{id}','Admin\AdminController@edit');
  Route::post('/admins/{id}/update','Admin\AdminController@update');
  Route::get('/admins/{id}/destroy','Admin\AdminController@destroy');
  Route::post('/admins','Admin\AdminController@store')->name('admins.save');
  Route::get('/admins/get/support','Admin\AdminController@getSupport');
  Route::get('/permissions','Admin\PermissionController@index')->name('permissions.index');
  Route::get('/permissions/{id}','Admin\PermissionController@edit');
  Route::post('/permissions/{id}/update','Admin\PermissionController@update');
  Route::get('/permissions/{id}/destroy','Admin\PermissionController@destroy');
  Route::post('/permissions','Admin\PermissionController@store')->name('permissions.save');
  Route::get('/roles','Admin\RoleController@index')->name('roles.index');
  Route::get('/roles/{id}','Admin\RoleController@edit');
  Route::post('/roles/{id}/update','Admin\RoleController@update');
  Route::get('/roles/{id}/destroy','Admin\RoleController@destroy');
  Route::post('/roles','Admin\RoleController@store')->name('roles.save');
  Route::get('/guides','Admin\GuideController@index')->name('guides.index');
  Route::get('/guides/{id}','Admin\GuideController@edit');
  Route::post('/guides/{id}/update','Admin\GuideController@update');
  Route::get('/guides/{id}/destroy','Admin\GuideController@destroy');
  Route::post('/guides','Admin\GuideController@store')->name('guides.save');
  Route::get('/types','Admin\TypeController@index')->name('types.index');
  Route::get('/types/{id}','Admin\TypeController@edit');
  Route::post('/types/{id}/update','Admin\TypeController@update');
  Route::get('/types/{id}/destroy','Admin\TypeController@destroy');
  Route::post('/types','Admin\TypeController@store')->name('types.save');
  Route::get('/packages','Admin\PackageController@index')->name('packages.index');
  Route::get('/packages/{id}','Admin\PackageController@edit');
  Route::post('/packages/{id}/update','Admin\PackageController@update');
  Route::get('/packages/{id}/destroy','Admin\PackageController@destroy');
  Route::post('/packages','Admin\PackageController@store')->name('packages.save');
  Route::get('/blogs','Admin\BlogController@index')->name('blogs.index');
  Route::get('/blogs/{id}','Admin\BlogController@edit');
  Route::post('/blogs/{id}/update','Admin\BlogController@update');
  Route::get('/blogs/{id}/destroy','Admin\BlogController@destroy');
  Route::post('/blogs','Admin\BlogController@store')->name('blogs.save');
  Route::get('/tickets','Admin\TicketController@index')->name('tickets.index');
  Route::get('/tickets/{id}','Admin\TicketController@edit');
  Route::post('/tickets/{id}/update','Admin\TicketController@update');
  Route::get('/tickets/{id}/destroy','Admin\TicketController@destroy');
  Route::get('/tickets/{id}/history','Admin\TicketController@history');
  Route::post('/tickets','Admin\TicketController@store')->name('tickets.save');
  Route::get('/services','Admin\ServiceController@index')->name('services.index');
  Route::get('/services/{id}','Admin\ServiceController@edit');
  Route::post('/services/{id}/update','Admin\ServiceController@update');
  Route::get('/services/{id}/destroy','Admin\ServiceController@destroy');
  Route::post('/services','Admin\ServiceController@store')->name('services.save');
  Route::get('/customers','Admin\CustomerController@index')->name('customers.index');
  Route::get('/customers/{id}/packages','Admin\CustomerController@packages');
  Route::get('/states','Admin\StateController@index')->name('states.index');
  Route::get('/states/{id}','Admin\StateController@edit');
  Route::post('/states/{id}/update','Admin\StateController@update');
  Route::get('/states/{id}/destroy','Admin\StateController@destroy');
  Route::post('/states','Admin\StateController@store')->name('states.save');
  Route::get('/marketplaces','Admin\MarketplaceController@index')->name('marketplaces.index');
  Route::get('/marketplaces/{id}','Admin\MarketplaceController@edit');
  Route::post('/marketplaces/{id}/update','Admin\MarketplaceController@update');
  Route::get('/marketplaces/{id}/destroy','Admin\MarketplaceController@destroy');
  Route::post('/marketplaces','Admin\MarketplaceController@store')->name('marketplaces.save');
  Route::get('/monthlysales','Admin\MonthlysaleController@index')->name('monthlysales.index');
  Route::get('/monthlysales/{id}','Admin\MonthlysaleController@edit');
  Route::post('/monthlysales/{id}/update','Admin\MonthlysaleController@update');
  Route::get('/monthlysales/{id}/destroy','Admin\MonthlysaleController@destroy');
  Route::post('/monthlysales','Admin\MonthlysaleController@store')->name('monthlysales.save');
  Route::get('/fulfillments','Admin\FulfillmentController@index')->name('fulfillments.index');
  Route::get('/fulfillments/{id}','Admin\FulfillmentController@edit');
  Route::post('/fulfillments/{id}/update','Admin\FulfillmentController@update');
  Route::get('/fulfillments/{id}/destroy','Admin\FulfillmentController@destroy');
  Route::post('/fulfillments','Admin\FulfillmentController@store')->name('fulfillments.save');
  Route::get('/categoriesdeals','Admin\CategoriesdealController@index')->name('categoriesdeals.index');
  Route::get('/categoriesdeals/{id}','Admin\CategoriesdealController@edit');
  Route::post('/categoriesdeals/{id}/update','Admin\CategoriesdealController@update');
  Route::get('/categoriesdeals/{id}/destroy','Admin\CategoriesdealController@destroy');
  Route::post('/categoriesdeals','Admin\CategoriesdealController@store')->name('categoriesdeals.save');
  Route::get('/getdevices','Admin\DeviceController@getDevices')->name('devices.getdevices');
  Route::get('/devices','Admin\DeviceController@index')->name('devices.index');
  Route::get('/devices/{id}','Admin\DeviceController@edit');
  Route::post('/devices/{id}/update','Admin\DeviceController@update');
  Route::get('/devices/{id}/destroy','Admin\DeviceController@destroy');
  Route::post('/devices','Admin\DeviceController@store')->name('devices.save');
  Route::get('/updates','Admin\UpdateController@index')->name('updates.index');
  Route::get('/updates/{id}','Admin\UpdateController@edit');
  Route::post('/updates/{id}/update','Admin\UpdateController@update');
  Route::get('/updates/{id}/destroy','Admin\UpdateController@destroy');
  Route::post('/updates','Admin\UpdateController@store')->name('updates.save');
});
