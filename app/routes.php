<?php

Route::get('api/search/book', array('as'=>'api.book', 'uses'=>'BookController@getDatatable'));
Route::group(array('before' => 'auth'), function() {
  Route::get('/','HomeController@index');
  Route::post('/search/book','BookController@SearchFromAttr');
  Route::get('logout','HomeController@doLogout');

  Route::get('book/add','BookController@newBook');
  Route::post('book/add','BookController@postBook');

  Route::get('logout','HomeController@doLogout');
  Route::post('editMedia', 'MediaController@editMedia');

  Route::group(array('prefix' => 'book/{bid}'), function($bid){

    Route::get('/', 'BookController@getBook');

    Route::get('edit', 'BookController@getEdit');
    Route::post('edit', 'BookController@postEdit');

    Route::group(array('prefix' => 'prod/'), function(){
      Route::post('add', 'BookController@postProdAdd');
      Route::post('edit', 'BookController@postProdedit');
      Route::get('view', 'BookController@getProd');

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
  Route::group(array('prefix' => 'borrow/'), function(){
    Route::get('/', 'BorrowController@index');
    Route::get('book/{mediaId}', 'BorrowController@postSelectBook');
    Route::get('search', 'BorrowController@getSearch');
    Route::get('submit', 'BorrowController@postSubmitSelectedList');
    Route::get('clear', 'BorrowController@getClear');

    Route::post('retdate', 'BorrowController@postRetDate');
    Route::post('delete/{mediaID}', 'BorrowController@deleteSelectedMedia');

    Route::get('member/{memberId}','BorrowController@getMember');
    Route::post('member','BorrowController@postMember');
  });

    // Return media
  Route::group(array('prefix' => 'return/'), function(){
    Route::get('/','ReturnController@getIndex');
    Route::get('clear','ReturnController@getClear');
    Route::post('add','ReturnController@postAdd');
    Route::get('member/{memberId}','ReturnController@getMember');
    Route::post('member','ReturnController@postMember');
    Route::post('submit', 'ReturnController@postSubmitReturn');
    Route::post('delete/{mediaID}', 'ReturnController@deleteSelectedMedia');
  });

    // User
  Route::get('user/{id}','UsersController@show');
  Route::post('user/{id}/destroy','UsersController@destroy');

  // borrower system
  Route::model('member', 'Member');

  Route::group(array('prefix' => 'borrower/'), function(){
    Route::get('/','BorrowerSystemController@index');
    Route::get('create', 'BorrowerSystemController@create');
    Route::get('editMember', 'BorrowerSystemController@edit');
    Route::get('delete/{member}', 'BorrowerSystemController@delete');

    Route::post('create', 'BorrowerSystemController@handleCreate');
    Route::post('edit', 'BorrowerSystemController@handleEdit');
    Route::post('delete', 'BorrowerSystemController@handleDelete');

    Route::post('search', 'BorrowerSystemController@searchMember');
    Route::post('postMember', 'BorrowerSystemController@postMember');

    Route::post('getHistory', 'BorrowerSystemController@getHistory');
    Route::post('getNonReturn', 'BorrowerSystemController@getNonReturnList');
  });

  // Report Gen
  Route::group(array('prefix' => 'report'), function($bid){
    Route::get('/','ReportController@getIndex');

    Route::group(array('prefix' => 'book'), function(){
      Route::get('/','ReportController@getBookIndex');
      Route::get('/sth','ReportController@getBookSth'); // Some report - Must change the name
      Route::get('/detail','ReportController@getBookDetail'); // Issue 134
    });

    Route::group(array('prefix' => 'borrow'), function(){
      Route::get('/','ReportController@getBorrowIndex');
      Route::get('/sth','ReportController@getBorrowSth'); // Some report - Must change the name
    });
  });
});

Route::get('authentication','HomeController@showAuthen');
Route::post('loginUser','HomeController@doLogin');
Route::get('registration','UsersController@create');
Route::post('user/store','UsersController@store');
