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
    return view('login');

});

Auth::routes();

//Route::get('/home', 'HomeController@index');

//-------------Admin-routes

Route::get('/admin/dashboard', 'AdminController@index');

Route::get('/admin/users', 'AdminController@users')->name('users');
Route::get('/admin/users/edit/{id}', 'AdminController@edituser');
Route::patch('/admin/users/update/{id}', 'AdminController@updateuser');
Route::delete('/admin/users/delete/{id}', 'AdminController@deleteuser');

Route::get('/admin/options', 'AdminController@options')->name('options');

Route::get('/admin/backup', 'AdminController@backup')->name('backup');

//gestione rubrica utenti (caricamento manuale primo step poi tramite ldap-gal)


//-------------Manager-routes

Route::get('/manager/dashboard', 'ManagerController@index');

Route::get('/manager/whitelist','WhitelistController@index')->name('whitelist');
Route::get('/manager/whitelist/edit/{id}','WhitelistController@editdomain');
Route::patch('/manager/whitelist/update/{id}', 'WhitelistController@updatedomain');
Route::delete('/manager/whitelist/delete/{id}','WhitelistController@deletedomain');
Route::get('/manager/whitelist/new', 'WhitelistController@newdomain');
Route::post('/manager/whitelist/new', 'WhitelistController@adddomain');

Route::get('/manager/blacklist','BlacklistController@index')->name('blacklist');
Route::get('/manager/blacklist/edit/{id}','BlacklistController@editdomain');
Route::patch('/manager/blacklist/update/{id}', 'BlacklistController@updatedomain');
Route::delete('/manager/blacklist/delete/{id}','BlacklistController@deletedomain');
Route::get('/manager/blacklist/new', 'BlacklistController@newdomain');
Route::post('/manager/blacklist/new', 'BlacklistController@adddomain');

Route::get('/manager/adgroup','AdgroupController@index')->name('adgroup');
Route::get('/manager/adgroup/edit/{id}','AdgroupController@editadgroup');
Route::patch('/manager/adgroup/update/{id}', 'AdgroupController@updateadgroup');
Route::delete('/manager/adgroup/delete/{id}','AdgroupController@deleteadgroup');
Route::get('/manager/adgroup/new', 'AdgroupController@newadgroup');
Route::post('/manager/adgroup/new', 'AdgroupController@addadgroup');

Route::get('/manager/address','AddressController@index')->name('address');
Route::get('/manager/address/edit/{id}','AddressController@editaddress');
Route::patch('/manager/address/update/{id}', 'AddressController@updateaddress');
Route::delete('/manager/address/delete/{id}','AddressController@deleteaddress');
Route::get('/manager/address/new', 'AddressController@newaddress');
Route::post('/manager/address/new', 'AddressController@addaddress');

//policy



