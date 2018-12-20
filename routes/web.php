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
Packages:
1-Laravel Collective
2-Socialite
3-Darryldecode Cart
4-Yajra datatable
Plus
5-Vanguard			 =>
			is a login and user management app that allows website owners to quickly add and enable user authentication and authorisation 
6- Classic Invoicer =>
			A web-based invoicing and client management system, Classic Invoicer allows users to create custom invoices and send them to clients directly.
7-Botble            =>
	is a Laravel content management system that allows you to create, modify and manage any kind of digital content you want. The system accommodates a multilingual admin back-end, has two ready-made themes that can be modified as you like, and has many great features like a gorgeous photo gallery and integrated Google Analytics.
*/
Route::group(['prefix'=>'admin'],function(){
		Config::set('auth.defines','admin');
		Route::group(['middleware'=>'admin:admin'],function(){
			Route::resource('client','ClientController');
			Route::resource('service','ServicesController');
			Route::post('client/{id}','ClientController@services')->name('services');
			Route::any('logout','AdminAuthController@logout')->name('Adminlogout');
		});
		//Start Admin Auth Routes(Login,Register and Reset-password)
		Route::get('/','AdminAuthController@login');
		Route::post('/','AdminAuthController@loginCheck')->name('AdminLogin');
        Route::post('register','AdminAuthController@register')->name('AdminRegister');
		//admin forgot password
		Route::get('forgot/password','AdminAuthController@Forget_password')->name('forgotPass');
		Route::post('forgot/password','AdminAuthController@verifieEmail')->name('verifiemail');
		//reset password
		Route::get('reset/password/{token}','AdminAuthController@resetAdminPassword');
		Route::post('reset/password/{token}','AdminAuthController@NewResetAdminPassword');
		//logout
		//End Admin Auth Routes
		//Start Languages Routes
		Route::get('lang/{lang}',function($lang){
			session()->has('lang')?session()->forget('lang'):'';
			$lang == 'ar'?session()->put('lang','ar'):session()->put('lang','en');
			return back();
		});
		//End Languages Routes
});


/*if you want to insert dummy data to tables,just delete next comment and run project
   php artisan db:seed
*/
  // factory(App\Client::class,10)->create();
  // factory(App\Service::class,5)->create();