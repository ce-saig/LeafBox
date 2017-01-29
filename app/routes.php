<?php

Route::get('api/search/book', array('as'=>'api.book', 'uses'=>'BookController@getDatatable'));
Route::group(array('before' => 'auth'), function() {
  Route::get('/','HomeController@index');
  Route::post('/search/book','BookController@SearchFromAttr');
  Route::get('logout','HomeController@doLogout');

  Route::get('book/add','BookController@newBook');
  Route::post('book/add','BookController@postBook');

  Route::get('logout','HomeController@doLogout');
  Route::post('edit_media', 'MediaController@editMedia');
  Route::post('anyborrower', 'MediaController@isAnyBorrower');

  Route::group(array('prefix' => 'book/{bid}'), function($bid){

    Route::get('/', 'BookController@getBook');

    Route::get('edit', 'BookController@getEdit');
    Route::get('edit_book', 'BookController@getEditBook');
    Route::post('edit_book', 'BookController@postEditBook');
    Route::get('delete', 'BookController@delete');
    Route::post('get_media', 'MediaController@getMedia');
    Route::get('get_master_media', 'MediaController@getMasterMedia');
    Route::post('get_media_by_type', 'MediaController@getMediaByType');
    Route::post('change_master', 'MediaController@changeMaster');
    Route::get('count_media', 'MediaController@countMedia');
    Route::post('{mid}', 'MediaController@getMediaDetailBorrow');
    Route::post('{mid}/edit', 'MediaController@postMediaDetailBorrow');

    Route::group(array('prefix' => 'prod/'), function(){
      Route::post('get_status', 'BookController@getLastProdStatus');
      Route::get('get_all_prod', 'BookController@getAllProd');
      Route::post('add', 'BookController@postProdAdd');
      Route::post('edit', 'BookController@postProdedit');
      Route::post('delete', 'BookController@deleteProd');
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
  Route::post('return/member/borrowed', 'ReturnController@getUserMedia');

  // 
  Route::group(array('prefix' => 'user/'), function()
  {
    Route::get('{id}','UsersController@show');
    Route::post('{id}/destroy','UsersController@destroy');
    Route::post('search', 'UsersController@searchUser');
  });


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

  // Backup
  Route::group(array('prefix' => 'backup'), function($bid){
    Route::get('/', 'BackupController@index');
  });  

  // Report Gen
  Route::group(array('prefix' => 'report'), function($bid){
//    Route::get('/','ReportController@getIndex');
    Route::get('/','ReportController@newReport');
    Route::post('/create_report_book','ReportController@getBooks');
    Route::post('/create_report_media','ReportController@getMedias');
    Route::post('/create_report_prod','ReportController@getProds');
    Route::post('/create_report_prod','ReportController@getProds');
    Route::post('/export_csv','ReportController@exportCSV');

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

Route::get('/templates', 'TemplateController@getTemplate');