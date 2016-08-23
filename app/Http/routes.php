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
//For auth on route
//Route::get('articles',['middleware'=>'auth','uses'=>'ArticlesController@index']);

Route::get('about',['middleware'=>'auth',function(){
    return 'this page will only show if the user is signed in';
}]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('articles','ArticlesController@index');
Route::get('articles/create','ArticlesController@create');
Route::get('articles/{articles}/edit','ArticlesController@edit');
Route::patch('articles/{articles}','ArticlesController@update');
Route::get('articles/{articles}','ArticlesController@show');
Route::post('articles', 'ArticlesController@store');

Route::controllers([
        'auth'=>'Auth\AuthController',
        'password' => 'Auth\PasswordController',
]);


Route::get('/home', 'HomeController@index');

Route::get('foo',['middleware'=>'manager',function(){
    return 'this page may only be viewed by managers';
}]);