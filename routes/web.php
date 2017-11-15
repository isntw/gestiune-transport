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
Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('transports', 'TransportController');
Route::resource('costs', 'CostController');

Route::get('/statistics', 'Api\DashboardStatisticsController@statistics')->name('dashboard.statistics');
