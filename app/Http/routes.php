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

//New interface demo
interface BarInterface{}
class Bab implements BarInterface{}
// App::bind('BarInterface','bab');
// or
app()->bind('BarInterface','bab');
// Route::get('bab',function(BarInterface $bab){
//     dd($bab);
// });
//or
Route::get('bab',function(){
    // $bab=App::make('BarInterface');
    //or
    // $bab=app()['BarInterface'];
     $bab=app('BarInterface');
    dd($bab);
});

// App::bind('BarInterface', function(){
//     return new Bab;
// });




//Bar example to know what is App bind and Service
class Baz{}
class Bar{
    public $baz;

    public function __construct(Baz $baz)
    {
        $this->baz=$baz;
    }
}


Route::get('bar',function(Bar $bar){
    dd($bar);
});



//also can app()->bind
// App::bind('Bar',function(){
//     dd('fetching');
//     return new Bar(new Baz);
// });


Route::get('fee','FooController@foo');

Route::get('about',['middleware'=>'auth',function(){
    return 'this page will only show if the user is signed in';
}]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('tags/{tags}','TagsController@show');

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
Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
