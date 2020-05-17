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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('fund/crawlData', 'FundController@crawlData')->name('finhay.get_data');
Route::get('fund/{id}', 'FundController@getFundPrice');

Route::get('portfolio/{id}', 'PortfolioController@getPortfolioStructure');
