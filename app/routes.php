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
//-------------------------------
Route::get('book/{bid}','BookController@getBook');

Route::get('add','BookController@newBook');
//Route::post('add','BookController@postBook');
Route::post('add',function(){
	return 'hello';
});

Route::group(array('prefix' => 'book/{bookId}'), function($bookId){

  Route::get('/', function($bookId) {
    $data['bookId'] = $bookId;
    return View::make('mediaDetail', $data);
  });

  Route::post('braille/add', 'BookController@addBraille');
  Route::post('cassette/add', 'BookController@addCassette');
});
