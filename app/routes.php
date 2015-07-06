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

  Route::get('dvd/deleteAll','MediaController@removeAllDvd');
  Route::get('cd/deleteAll','MediaController@removeAllCd');
  Route::get('daisy/deleteAll','MediaController@removeAllDaisy');
  Route::get('cassette/deleteAll','MediaController@removeAllCassette');
  Route::get('braille/deleteAll','MediaController@removeAllBraille');

  Route::get('cassette/delete/{part_id}','MediaController@removeSelectedCassette');
  Route::get('cd/delete/{part_id}','MediaController@removeSelectedCd');
  Route::get('dvd/delete/{part_id}','MediaController@removeSelectedDvd');
  Route::get('braille/delete/{part_id}','MediaController@removeSelectedBraille');
  Route::get('daisy/delete/{part_id}','MediaController@removeSelectedDaisy');

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

// Borrow media
Route::get('borrow', 'BorrowController@index');
Route::get('borrow/book/{mediaId}', 'BorrowController@postSelectBook');
Route::get('borrow/search', 'BorrowController@getSearch');
Route::get('borrow/submit', 'BorrowController@postSubmitSelectedList');
Route::get('borrow/clear', 'BorrowController@getClear');

Route::get('borrow/member/{memberId}','BorrowController@getMember');
Route::post('borrow/member','BorrowController@postMember');

// Return media
Route::get('return','ReturnController@getIndex');
Route::get('return/clear','ReturnController@getClear');
Route::post('return/add','ReturnController@postAdd');