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
    return view('auth.login');
});
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/manager/logout', 'Auth\LoginController@logout');
Route::get('/admin/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index');

//-------------Admin-routes

Route::get('/admin/dashboard', 'AdminController@index')->middleware('auth');


Route::get('/admin/users', 'AdminController@users')->name('users');
Route::get('/admin/users/edit/{id}', 'AdminController@edituser');
Route::get('/admin/options', 'AdminController@options')->name('options');
Route::get('/admin/backup', 'AdminController@backup')->name('backup');
Route::get('/admin/import','AdminController@import');
Route::post('/admin/uploadlicense','AdminController@uploadlicense');
Route::patch('/admin/users/update/{id}', 'AdminController@updateuser');
Route::patch('/admin/users/status/{id}', 'AdminController@enable_user');
Route::delete('/admin/users/delete/{id}', 'AdminController@deleteuser');


//-------------Manager-routes

Route::get('/manager/dashboard', 'ManagerController@index');
Route::get('/manager/whitelist','WhitelistController@index')->name('whitelist');
Route::get('/manager/whitelist/edit/{id}','WhitelistController@editdomain');
Route::get('/manager/whitelist/new', 'WhitelistController@newdomain');
Route::post('/manager/whitelist/new', 'WhitelistController@adddomain');
Route::patch('/manager/whitelist/update/{id}', 'WhitelistController@updatedomain');
Route::delete('/manager/whitelist/delete/{id}','WhitelistController@deletedomain');


Route::get('/manager/blacklist','BlacklistController@index')->name('blacklist');
Route::get('/manager/blacklist/edit/{id}','BlacklistController@editdomain');
Route::get('/manager/blacklist/new', 'BlacklistController@newdomain');
Route::post('/manager/blacklist/new', 'BlacklistController@adddomain');
Route::patch('/manager/blacklist/update/{id}', 'BlacklistController@updatedomain');
Route::delete('/manager/blacklist/delete/{id}','BlacklistController@deletedomain');


Route::get('/manager/adgroup','AdgroupController@index')->name('adgroup');
Route::get('/manager/adgroup/edit/{id}','AdgroupController@editadgroup');
Route::get('/manager/adgroup/new', 'AdgroupController@newadgroup');
Route::post('/manager/adgroup/new', 'AdgroupController@addadgroup');
Route::patch('/manager/adgroup/update/{id}', 'AdgroupController@updateadgroup');
Route::delete('/manager/adgroup/delete/{id}','AdgroupController@deleteadgroup');


Route::get('/manager/address','AddressController@index')->name('address');
Route::get('/manager/address/edit/{id}','AddressController@editaddress');
Route::get('/manager/address/new', 'AddressController@newaddress');
Route::post('/manager/address/new', 'AddressController@addaddress');
Route::patch('/manager/address/update/{id}', 'AddressController@updateaddress');
Route::delete('/manager/address/delete/{id}','AddressController@deleteaddress');


Route::get('/manager/policy','PolicyController@index')->name('policy');
Route::get('/manager/policy/edit/{id}','PolicyController@editpolicy')->name('edit_policy');
Route::get('/manager/policy/new','PolicyController@newpolicy');
Route::get('/manager/policy/assignment','PolicyController@policyassignment');
Route::get('/manager/policy/assign/{id}', 'PolicyController@assign_policy');
Route::post('/manager/policy/new','PolicyController@savepolicy');
Route::post('/manager/policy/addaction/{id}', 'PolicyController@addaction');
Route::patch('/manager/policy/update/{id}', 'PolicyController@updatepolicy');
Route::patch('/manager/policy/enablepolicy/{id}', 'PolicyController@enablepolicy');
Route::patch('/manager/policy/setactionpriority/{id}', 'PolicyController@updateactionpriority');
Route::patch('/manager/policy/activeaction/{id}', 'PolicyController@activeaction');
Route::patch('/manager/policy/update_grp_assignments/{id}', 'PolicyController@update_grp_assignments');
Route::patch('/manager/policy/update_addr_assignments/{id}', 'PolicyController@update_addr_assignments');
Route::delete('/manager/policy/delete/{id}','PolicyController@deletepolicy');
Route::delete('/manager/policy/removeaction/{id}','PolicyController@removeaction');
//policy




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
