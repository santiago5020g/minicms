<?php 



Route::get('page/{id}/', 'Cr\pages\PageController@page');
Route::post('disableSection', 'Cr\pages\PageController@disableSection');
Route::post('savePage', 'Cr\pages\PageController@savePage');



