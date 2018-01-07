<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * AUTH
 */

 // Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('/api/schulenSearchOrt', 'Auth\AuthController@schulenSearchOrt');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/*
 * END AUTH
 */

Route::get('/', "IndexController@index");

Route::get('/schulen', "SchulMasterController@redirect");
Route::get('/schule', "SchulMasterController@redirect");

Route::get('/schulen/search', 'SearchController@searchGet'); //die reihenfolge ist wichtig #schulomat in slack
//Route::get('/schulen/search/{key}', 'SearchController@search'); //die reihenfolge ist wichtig #schulomat in slack

Route::get('/schulen/{page}', "SchulMasterController@pagination");
Route::get('/filter', "SchulMasterController@paginationFilter");
Route::get("/schule/newkeyword", "SchulMasterController@newKeyword");
Route::post('/schule/newkeyword', "SchulMasterController@newKeywordEintragen");



Route::get('/schule/{id}', "SchulDetailController@detail");

Route::get('/schule/{id}/karte', "SchulDetailController@karte");

Route::get("/schule/{id}/eintragen", "SchulDetailController@fragebogen");

Route::post("/schule/{id}/eintragen", "SchulDetailController@eintragen");

Route::get('/schule/{id}/redaktion', "SchulDetailController@redaktion");

Route::post("/schule/{id}/redaktion", "SchulDetailController@redaktionEintragen");

// Schulverwaltung
Route::get('/schule/{id}/verwaltung', "SchulVerwaltungController@index");
Route::get('/schule/{id}/verwaltung/schulcode', "SchulVerwaltungController@recreateSchulcode");
Route::get('/schule/{id}/verwaltung/daten', "SchulVerwaltungController@daten");
Route::post('/schule/{id}/verwaltung/daten', "SchulVerwaltungController@datenAendern");
Route::get('/schule/{id}/verwaltung/einzelberichtmelden/{berichtId}', "SchulVerwaltungController@einzelberichtMelden");

// Userverwaltung
Route::get('/user', "UserVerwaltungController@index");
Route::get('/user/password', "UserVerwaltungController@password");
Route::post('/user/changedata', "UserVerwaltungController@changeData");
Route::post('/user/changepassword', "UserVerwaltungController@changePassword");
