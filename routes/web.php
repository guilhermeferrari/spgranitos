<?php


Route::get('/', 'Site\SiteController@index');
Route::post('/contato', ['as'=>'mensagem','uses'=>'Site\SiteController@email']);
