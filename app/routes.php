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
