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
Auth::routes();
//route to controller
//Route::get('/home', 'PagesController@homePage');

Route::get('/insert', 'PagesController@homePage');
Route::post('/insertguest', 'PagesController@insertGuest');
Route::get('/guestbylist', 'PagesController@extractAllguest');
Route::get('/guestbytbl', 'PagesController@extractTblguest');
Route::get('/guestbytbl/{tbl_num}', 'PagesController@extractTblguest2');
Route::get('/tblstats', 'PagesController@extractTblstasts');
Route::get('/tbl_layout', 'PagesController@layoutPage');
Route::get('/tbl_layoutDelete', 'PagesController@layoutDelete');
Route::get('/member_pointsAddPage', 'PagesController@memberPoints');
Route::post('/member_pointsAdd', 'PagesController@memberpointsAdd');
Route::get('/member_pointsPage', 'PagesController@memberpointsPage');



Route::get('/chkattn/{id}', 'PagesController@checkAttn');
Route::get('/delete/{id}', 'PagesController@deleteGuest');

Route::get('/registration', 'PagesController@register')->name('registration');



Route::get('/home', 'HomeController@index')->name('welcome');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');

//UploadFileController
//Route::get('/upload', 'UploadFileController@uploadForm');
Route::post('/upload', 'UploadFileController@fileUpload');
Route::get('/table_view', 'PagesController@table_view');
Route::get('/total', 'PagesController@totalGuest');


Route::post('/registerwed', 'UploadFileController@fileUpload2');