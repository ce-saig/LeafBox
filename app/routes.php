<?php

Route::get('api/search/book', array('as'=>'api.book', 'uses'=>'BookController@getDatatable'));
Route::group(array('before' => 'auth'), function() {
  Route::get('/','HomeController@index');
  Route::post('/search/book','BookController@SearchFromAttr');
  Route::get('logout','HomeController@doLogout');
  
  Route::get('book/add','BookController@newBook');
  Route::post('book/add','BookController@postBook');

  Route::group(array('prefix' => 'book/{bid}'), function($bid){

    Route::get('/', 'BookController@getBook');

    Route::post('edit', 'BookController@getEdit');
    Route::post('edit', 'BookController@postEdit');

    Route::group(array('prefix' => 'prod/'), function(){
      Route::post('add', 'BookController@postProdAdd');
    });

    Route::group(array('prefix' => 'braille/'), function(){
      Route::post('add', 'MediaController@addBraille');
      Route::get('delete/{part_id}','MediaController@removeSelectedBraille');
      Route::get('deleteAll','MediaController@removeAllBraille');
      Route::get('{id}', 'MediaController@getBraille');
      Route::post('{id}', 'MediaController@getBraille');
      Route::post('{id}/edit','MediaController@setBraille');
    });

    Route::group(array('prefix' => 'cassette/'), function(){
      Route::post('add', 'MediaController@addCassette');
      Route::get('delete/{part_id}','MediaController@removeSelectedCassette');
      Route::get('deleteAll','MediaController@removeAllCassette');
      Route::get('{id}', 'MediaController@getCassette');
      Route::post('{id}', 'MediaController@getCassette');
      Route::post('{id}/edit','MediaController@setCassette');
    });

    Route::group(array('prefix' => 'cd/'), function(){
      Route::post('add/', 'MediaController@addCD');
      Route::get('delete/{part_id}','MediaController@removeSelectedCd');
      Route::get('deleteAll','MediaController@removeAllCd');
      Route::get('{id}', 'MediaController@getCD');
      Route::post('{id}', 'MediaController@getCD');
      Route::post('{id}/edit','MediaController@setCD');
    });

    Route::group(array('prefix' => 'daisy/'), function(){
      Route::post('add', 'MediaController@addDaisy');
      Route::get('delete/{part_id}','MediaController@removeSelectedDaisy');
      Route::get('deleteAll','MediaController@removeAllDaisy');
      Route::get('{id}', 'MediaController@getDaisy');
      Route::post('{id}', 'MediaController@getDaisy');
      Route::post('{id}/edit','MediaController@setDaisy');
    });

    Route::group(array('prefix' => 'dvd/'), function(){
      Route::post('add', 'MediaController@addDVD');
      Route::get('delete/{part_id}','MediaController@removeSelectedDvd');
      Route::get('deleteAll','MediaController@removeAllDvd');
      Route::get('{id}', 'MediaController@getDVD');
      Route::post('{id}', 'MediaController@getDVD');
      Route::post('{id}/edit','MediaController@setDVD');
    });
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
