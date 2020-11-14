<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCreateUsersController;
use App\Http\Controllers\ShowContractorsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentsForReviewController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WorkAreaController;
use App\Http\Controllers\TechnicianController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Technician;
use App\Http\Middleware\Vendor;


Route::middleware(['admin'])->group( function() {

	Route::get('/', 'AdminController@index'); //routes to homepage default
	Route::post('/admin/changepassword', 'ResetPasswordController@resetPassword')->name('changePassword');
	Route::get('/admin', 'AdminController@index')->name('admin.index');			//routes to homepage default
	Route::get('/createusers', 'AdminController@create')->name('admin.createusers'); //To create user button
	Route::post('/createusers', 'AdminCreateUsersController@storeusers')->name('admin.storeusers'); //To store users in DB | admin default index page

	Route::get('/showcontractors/{showdetailedcontractor}', 'ShowContractorsController@show')->name('admin.showdetailedcontractors');  // when clicking VIEW 
	Route::put('/showcontractors/{showdetailedcontractor}', 'ShowContractorsController@update')->name('admin.update'); //Update db

	Route::get('/showcontractors', 'ShowContractorsController@index')->name('admin.showcontractors');	// admin default index that shows contractors list
	Route::get('/addcontractors', 'ShowContractorsController@create')->name('admin.addcontractors'); //To create user button
	Route::post('/addcontractors/', 'ShowContractorsController@store')->name('admin.storecontractors'); //To store contractors in DB | admin default index page

	Route::get('FormsandDocuments', 'DocumentController@formsanddocuments')->name('admin.forms');
	Route::put('FormsandDocuments/Update', 'DocumentController@updatedocument')->name('admin.updatedocument');
	Route::delete('FormsandDocuments/Removed', 'DocumentController@deletedocument')->name('admin.deletedocument');
	Route::put('FormsandDocuments', 'DocumentController@newdocument')->name('admin.newdocument');

	Route::get('/reviewdocuments/', 'DocumentsForReviewController@index')->name('admin.review');
	Route::put('/reviewdocuments/', 'DocumentsForReviewController@update')->name('admin.reviewed');

	Route::get('/workarea/', 'DocumentsForReviewController@workarea')->name('admin.workarea');

    Route::get('/admin/searchusers', 'AdminController@search')->name('admin.search');
    Route::get('/workarea/searchcontractors', 'DocumentsForReviewController@search')->name('admin.searchworkarea');

});

Route::middleware(['vendor'])->group(function () {

	Route::get('/vendor', 'VendorController@index')->name('vendor.index');
	Route::post('/vendor/changepassword', 'ResetPasswordController@resetPasswordvendor')->name('changePasswordvendor');

	Route::get('/vendor/update/', 'VendorController@edit')->name('vendor.edit'); //button to update vendor details
    Route::put('/vendor/update/', 'VendorController@update')->name('vendor.update'); //function to update vendor details
    Route::get('/vendor/update/{country}', 'VendorController@getStates');
    Route::get('/vendor/update/states/{state}', 'VendorController@getCities');
   		//Route::get('vendor/update', 'CountryController@getStateList')->name('getstate');
		//Route::get('get-city-list', 'CountryController@getCityList');

    Route::get('/MyTechnicians', 'VendorController@showtechnicians')->name('vendor.showtechnicians');  //Shows technicians page
    Route::get('/MyTechnicians/Add', 'VendorController@createtechnicians')->name('vendor.addtechnicians'); //To add technicians button
    Route::post('/MyTechnicians/Add', 'VendorController@storetechnicians')->name('vendor.storetechnicians'); //To store technicians in users table, and technician table

    Route::get('/MySkillSet', 'VendorController@viewskillset')->name('vendor.viewskillset'); //button to view skillset details
    Route::put('/MySkillSet', 'VendorController@updateskillset')->name('vendor.updateskillset'); //function to update skillset

    Route::get('/Insurance&Financial', 'DocumentController@index')->name('vendor.documentupload'); //view function
    Route::put('/Insurance&Financial', 'DocumentController@upload')->name('vendor.documentuploads'); //function to upload

    Route::get('/WorkArea&Technical', 'DocumentController@index2')->name('vendor.documentupload2'); //view function
    Route::put('/WorkArea&Technical', 'DocumentController@upload2')->name('vendor.documentuploads2'); //function to upload    

    Route::get('/WorkArea&Rates', 'WorkAreaController@rates')->name('vendor.rates');      
    Route::put('/WorkArea&Rates/Update', 'WorkAreaController@addrates')->name('vendor.addrates');   
	Route::delete('WorkArea&Rates/Removed', 'WorkAreaController@deleterates')->name('vendor.deleterates');    

	Route::get('/Forms', 'DocumentController@forms')->name('vendor.formsandagreements');     
});


Route::middleware(['technician'])->group(function () {
	Route::get('/technician', 'TechnicianController@index')->name('technician.index');
	Route::post('/technician/changepassword', 'ResetPasswordController@resetPasswordtechnician')->name('changePasswordtechnician');
});
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);
