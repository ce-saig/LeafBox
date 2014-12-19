<?php

// Route::get('/', function() { return Redirect::to('home/index'); });

//Route::controller('library', 'LibraryController');
//Route::controller('/', 'LibraryController');


/*Route::get('/',array('before' => 'auth',function(){
	return "HELLO";
}));*/
// AJAX Search
/*
Route::get('api/search/book', array('as'=>'api.book', 'uses'=>'BookController@getDatatable'));*/
Route::get('/','HomeController@index');
Route::post('/search/book','BookController@SearchFromAttr');

//move to route group
//Route::get('book/{bid}','BookController@getBook');

Route::get('book/add','BookController@newBook');
//Route::post('add','BookController@postBook');
Route::post('book/add','BookController@postBook');


Route::post('loginUser','HomeController@doLogin');
Route::get('logout','HomeController@doLogout');

Route::group(array('prefix' => 'book/{bid}'), function($bid){

  Route::get('/', 'BookController@getBook');

  Route::get('edit', 'BookController@getEdit');
  Route::post('edit', 'BookController@postEdit');

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

  Route::post('dvd/{id}/edit','MediaController@setDVD');
  Route::post('cd/{id}/edit','MediaController@setCD');
  Route::post('daisy/{id}/edit','MediaController@setDaisy');
  Route::post('cassette/{id}/edit','MediaController@setCassette');

});

Route::get('borrow', 'BorrowController@index');
Route::get('borrowSearch', 'BorrowController@search');
