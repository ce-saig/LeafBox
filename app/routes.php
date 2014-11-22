<?php

// Route::get('/', function() { return Redirect::to('home/index'); });

//Route::controller('library', 'LibraryController');
//Route::controller('/', 'LibraryController');


/*Route::get('/',array('before' => 'auth',function(){
	return "HELLO";
}));*/

Route::get('/','HomeController@index');
//move to route group
//Route::get('book/{bid}','BookController@getBook');

Route::get('book/add','BookController@newBook');
//Route::post('add','BookController@postBook');
Route::post('book/add','BookController@postBook');


Route::post('loginUser','HomeController@doLogin');
Route::get('logout','HomeController@doLogout');

Route::group(array('prefix' => 'book/{bid}'), function($bid){

  Route::get('/', 'BookController@getBook');
  Route::post('braille/add', 'MediaController@addBraille');
  Route::get('braille/{id}', 'MediaController@getBraille');
  Route::post('cassette/add', 'MediaController@addCassette');
  Route::get('cassette/{id}', 'MediaController@getCassette');
  Route::post('cd/add', 'MediaController@addCD');
  Route::get('cd/{id}', 'MediaController@getCD');
  Route::post('dvd/add', 'MediaController@addDVD');
  Route::get('dvd/{id}', 'MediaController@getDVD');
  Route::post('daisy/add', 'MediaController@addDaisy');
  Route::get('daisy/{id}', 'MediaController@getDaisy');
  
});
