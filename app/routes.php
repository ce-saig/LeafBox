<?php

// Route::get('/', function() { return Redirect::to('home/index'); });

//Route::controller('library', 'LibraryController');
//Route::controller('/', 'LibraryController');


/*Route::get('/',array('before' => 'auth',function(){
	return "HELLO";
}));*/

Route::get('login',function(){
	return View::make('library.login');
});

Route::get('/',array(function(){
	return View::make('library.index');
}));
//move to route group
//Route::get('book/{bid}','BookController@getBook');

Route::get('book/add','BookController@newBook');
//Route::post('add','BookController@postBook');
Route::post('book/add','BookController@postBook');

Route::group(array('prefix' => 'book/{bid}'), function($bid){

  Route::get('/', 'BookController@getBook');
  Route::get('edit', 'BookController@getEdit');//TODO
  Route::post('edit', 'BookController@postEdit');//TODO

  Route::post('braille/add', 'MediaController@addBraille');
  Route::post('cassette/add', 'MediaController@addCassette');
  Route::post('cd/add', 'MediaController@addCD');
  Route::post('dvd/add', 'MediaController@addDVD');
  Route::post('daisy/add', 'MediaController@addDaisy');

  Route::get('braille/{id}', 'MediaController@getBraille');//TODO
  Route::post('braille/{id}', 'MediaController@getBraille');//TODO
  
  Route::get('cassette/{id}', 'MediaController@getCassette');//TODO
  Route::post('cassette/{id}', 'MediaController@getCassette');//TODO
  
  Route::get('cd/{id}', 'MediaController@getCD');//TODO
  Route::post('cd/{id}', 'MediaController@getCD');//TODO
  
  Route::get('dvd/{id}', 'MediaController@getDVD');//TODO
  Route::post('dvd/{id}', 'MediaController@getDVD');//TODO

  Route::get('daisy/{id}', 'MediaController@getDaisy');//TODO
  Route::post('daisy/{id}', 'MediaController@getDaisy');//TODO
});
