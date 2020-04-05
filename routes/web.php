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

Auth::routes();
Route::get('snmp/get','SnmpController@getView')->name('snmp/get');
Route::post('snmp/get','SnmpController@get')->name('snmp/get');
Route::get('snmp/walk','SnmpController@walk');
Route::post('snmp/set','SnmpController@set')->name('snmp/set');
Route::get('snmp/set','SnmpController@setView')->name('snmp/set');



Route::get('tables/system','SnmpController@systemView')->name('tables/system');
Route::get('tables/ipNetToMediaIfIndex','SnmpController@ipNetToMediaIfIndexView')->name('tables/ipNetToMediaIfIndex');
Route::get('tables/ipNetToMediaPhysAddress','SnmpController@ipNetToMediaPhysAddressView')->name('tables/ipNetToMediaPhysAddress');
Route::get('tables/ipNetToMediaNetAddress','SnmpController@ipNetToMediaNetAddressView')->name('tables/ipNetToMediaNetAddress');
Route::get('tables/ipNetToMediaType','SnmpController@ipNetToMediaTypeView')->name('tables/ipNetToMediaType');

Route::get('/home', 'HomeController@index')->name('home');
