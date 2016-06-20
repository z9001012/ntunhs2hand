<?php

//首頁});
Route::get('/',"indexController@index");
Route::get('/depart/{depart}',"indexController@indexDepart");
//購物
Route::get('/book/{id}','SaleController@index');
Route::get('book/{book_id}/{user_id}',['uses'=>'SaleController@cart','middleware'=>'auth']);
Route::post('sendQ/{book_id}/{user_id}',['uses'=>'SaleController@sendQ','middleware'=>'auth']);
Route::post('answerQ/{q_id}',['uses'=>'SaleController@answerQ','middleware'=>'auth']);
Route::post('/sendOrder/{q_id}','SaleController@sendOrder');



//寄信頁面
Route::get('/postmail','mailController@getmail');
Route::post('/postmail','mailController@postmail');
Route::get('/commail',function(){return view("commail");});

//會員基本資料
Route::get('/user/add/{code}',"UserController@getUserAdd");
Route::post('/user/add/{code}',"UserController@postUserAdd");
Route::get('/user/welcome',"UserController@welcome");

//登入
Route::get('/login',"LoginController@getLogin");
Route::post('/login','LoginController@postLogin');
Route::get('/logout','Auth\AuthController@getLogout');

Route::resource('/mybooks','BookController');
Route::get('/mybooks/{id}/down','BookController@downType');
Route::get('mybooks/{id}/up','BookController@upType');

