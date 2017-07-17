<?php 


Route::post('page/{id}', 'Cr\pages\PageController@savePage');
Route::get('page/{id}', 'Cr\pages\PageController@page');
