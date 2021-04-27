<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login','admin\LoginController@index')->name('admin/login');
Route::post('admin/login','admin\LoginController@login')->name('admin.login');
Route::get('logout','admin\LoginController@logout')->name('logout');

Route::group(['namespace'=>'admin','prefix'=>'admin','middleware' => 'auth'], function()
{
	Route::get('/',function(){
		session()->put('page','dashboard');
		return view('admin.dashboard');
	});
	// Route::get('wallets',function(){
	// 	session()->put('page','wallets');
	// 	return view('admin.wallets');
	// });
	// Route::get('refunds',function(){
	// 	session()->put('page','refunds');
	// 	return view('admin.refunds');
	// });
	// Route::get('claim',function(){
	// 	session()->put('page','claim');
	// 	return view('admin.claims');
	// });
	Route::get('project-opened',function(){
		session()->put('page','opened');
		return view('admin.project-opened');
	});
	// Route::get('add-project',function(){
	// 	session()->put('page','projects');
	// 	return view('admin.add-project');
	// });
	// Route::get('edit-project',function(){
	// 	session()->put('page','projects');
	// 	return view('admin.edit-project');
	// });
	// Route::get('projects',function(){
	// 	session()->put('page','projects');
	// 	return view('admin.projects');
	// });
	// Route::get('users',function(){
	// 	session()->put('page','users');
	// 	return view('admin.users');
	// });

	//user
	Route::get('users',array('as'=>'viewadmin','uses'=>'AdminController@index'));
	Route::get('add-admin',array('as'=>'addadmin','uses'=>'AdminController@create'));
	Route::post('store-admin',array('as'=>'storeadmin','uses'=>'AdminController@store'));
	Route::get('edit-admin/{id}',array('as'=>'editadmin','uses'=>'AdminController@edit'));
	Route::post('update-admin/{id}',array('as'=>'updateadmin','uses'=>'AdminController@update'));
	Route::get('delete-admin/{id}',array('as'=>'deleteadmin','uses'=>'AdminController@destroy'));

	//project
	Route::get('projects',array('as'=>'viewproject','uses'=>'ProjectController@index'));
	Route::get('add-project',array('as'=>'addproject','uses'=>'ProjectController@create'));
	Route::post('store-project',array('as'=>'storeproject','uses'=>'ProjectController@store'));
	Route::get('edit-project/{id}',array('as'=>'editproject','uses'=>'ProjectController@edit'));
	Route::post('update-project/{id}',array('as'=>'updateproject','uses'=>'ProjectController@update'));
	Route::get('delete-project/{id}',array('as'=>'deleteproject','uses'=>'ProjectController@destroy'));

	//wallet
	Route::get('wallets',array('as'=>'viewwallet','uses'=>'WalletController@index'));
	Route::get('add-wallet',array('as'=>'addwallet','uses'=>'WalletController@create'));
	Route::post('store-wallet',array('as'=>'storewallet','uses'=>'WalletController@store'));
	Route::get('edit-wallet/{id}',array('as'=>'editwallet','uses'=>'WalletController@edit'));
	Route::post('update-wallet/{id}',array('as'=>'updatewallet','uses'=>'WalletController@update'));
	Route::get('delete-wallet/{id}',array('as'=>'deletewallet','uses'=>'WalletController@destroy'));

	//claim
	Route::get('claim',array('as'=>'viewclaim','uses'=>'ClaimTokenController@index'));
	Route::get('add-claim',array('as'=>'addclaim','uses'=>'ClaimTokenController@create'));
	Route::post('store-claim',array('as'=>'storeclaim','uses'=>'ClaimTokenController@store'));
	Route::get('edit-claim/{id}',array('as'=>'editclaim','uses'=>'ClaimTokenController@edit'));
	Route::post('update-claim/{id}',array('as'=>'updateclaim','uses'=>'ClaimTokenController@update'));
	Route::get('delete-claim/{id}',array('as'=>'deleteclaim','uses'=>'ClaimTokenController@destroy'));

	//refunds
	Route::get('refunds',array('as'=>'viewrefund','uses'=>'RefundController@index'));
	Route::get('add-refund',array('as'=>'addrefund','uses'=>'RefundController@create'));
	Route::post('store-refund',array('as'=>'storerefund','uses'=>'RefundController@store'));
	Route::get('edit-refund/{id}',array('as'=>'editrefund','uses'=>'RefundController@edit'));
	Route::post('update-refund/{id}',array('as'=>'updaterefund','uses'=>'RefundController@update'));
	Route::get('delete-refund/{id}',array('as'=>'deleterefund','uses'=>'RefundController@destroy'));

	//edit password
	Route::get('change-password', array('as'=>'change-password','uses'=>'LoginController@change_password'));
	Route::post('update-password',array('as'=>'updatepassword','uses'=>'LoginController@update_password'));
});



//forgot password
	Route::get('admin/forget-password', 'admin\ForgotPasswordController@getEmail');
	Route::post('admin/forget-password', 'admin\ForgotPasswordController@postEmail');

	Route::get('admin/reset-password/{token}', 'admin\ResetPasswordController@getPassword');
	Route::post('admin/reset-password', 'admin\ResetPasswordController@updatePassword');