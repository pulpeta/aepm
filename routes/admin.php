<?php
/**
 * Created by PhpStorm.
 * User: federicosibella
 * Date: 14/02/18
 * Time: 15:31
 */

Route::get('/admdashboard', 'AdminController@index');

Route::get('/users', 'AdminController@users');

Route::get('/options', 'AdminController@options');

Route::get('/backup', 'AdminController@backup');
