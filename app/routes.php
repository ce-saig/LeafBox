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
  Route::group(array('before' => 'auth'), function() {
  Route::get('/','HomeController@index');
  Route::post('/search/book','BookController@SearchFromAttr');

  //move to route group
  //Route::get('book/{bid}','BookController@getBook');

  Route::get('book/add','BookController@newBook');
  //Route::post('add','BookController@postBook');
  Route::post('book/add','BookController@postBook');


  Route::get('logout','HomeController@doLogout');


  Route::group(array('prefix' => 'book/{bid}'), function($bid){

    Route::get('/', 'BookController@getBook');

    Route::post('edit', 'BookController@getEdit');
    Route::post('edit', 'BookController@postEdit');

    Route::post('braille/add', 'MediaController@addBraille');
    Route::post('cassette/add', 'MediaController@addCassette');
    Route::post('cd/add/', 'MediaController@addCD');
    Route::post('dvd/add', 'MediaController@addDVD');
    Route::post('daisy/add', 'MediaController@addDaisy');

    Route::get('braille/deleteAll','MediaController@removeAllBraille');
    Route::get('cassette/deleteAll','MediaController@removeAllCassette');
    Route::get('cd/deleteAll','MediaController@removeAllCd');
    Route::get('dvd/deleteAll','MediaController@removeAllDvd');
    Route::get('daisy/deleteAll','MediaController@removeAllDaisy');

    Route::get('braille/delete/{part_id}','MediaController@removeSelectedBraille');
    Route::get('cassette/delete/{part_id}','MediaController@removeSelectedCassette');
    Route::get('cd/delete/{part_id}','MediaController@removeSelectedCd');
    Route::get('dvd/delete/{part_id}','MediaController@removeSelectedDvd');
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
    Route::post('braille/{id}/edit','MediaController@setBraille');

  });

  // Borrow media
  Route::get('borrow', 'BorrowController@index');
  Route::get('borrow/book/{mediaId}', 'BorrowController@postSelectBook');
  Route::get('borrow/search', 'BorrowController@getSearch');
  Route::get('borrow/submit', 'BorrowController@postSubmitSelectedList');
  Route::get('borrow/clear', 'BorrowController@getClear');

  Route::post('borrow/retdate', 'BorrowController@postRetDate');
  Route::post('borrow/delete/{mediaID}', 'BorrowController@deleteSelectedMedia');

  Route::get('borrow/member/{memberId}','BorrowController@getMember');
  Route::post('borrow/member','BorrowController@postMember');

  // Return media
  Route::get('return','ReturnController@getIndex');
  Route::get('return/clear','ReturnController@getClear');
  Route::post('return/add','ReturnController@postAdd');
  Route::get('return/member/{memberId}','ReturnController@getMember');
  Route::post('return/member','ReturnController@postMember');
  Route::post('return/submit', 'ReturnController@postSubmitReturn');
  Route::post('return/delete/{mediaID}', 'ReturnController@deleteSelectedMedia');

  // User
  Route::get('user/{id}','UsersController@show');
  Route::post('user/{id}/destroy','UsersController@destroy');

  // borrower system
  Route::model('member', 'Member');
  Route::get('borrowersystem','BorrowerSystemController@index');
  Route::get('borrowersystem/create', 'BorrowerSystemController@create');
  Route::get('borrowersystem/editMember/', 'BorrowerSystemController@edit');
  Route::get('borrowersystem/delete/{member}', 'BorrowerSystemController@delete');

  Route::post('borrowersystem/create', 'BorrowerSystemController@handleCreate');
  Route::post('borrowersystem/edit', 'BorrowerSystemController@handleEdit');
  Route::post('borrowersystem/delete', 'BorrowerSystemController@handleDelete');

  Route::post('borrowersystem/search', 'BorrowerSystemController@searchMember');
  Route::post('borrowersystem/postMember', 'BorrowerSystemController@postMember');

  Route::post('borrowersystem/getHistory/', 'BorrowerSystemController@getHistory');
  Route::post('borrowersystem/getNonReturn/', 'BorrowerSystemController@getNonReturnList');
});

Route::get('authentication','HomeController@showAuthen');
Route::post('loginUser','HomeController@doLogin');
Route::get('registration','UsersController@create');
Route::post('user/store','UsersController@store');
