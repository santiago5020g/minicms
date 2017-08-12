<?php 



Route::get('page/{id}/', 'Cr\pages\PageController@page');
Route::post('disableSection', 'Cr\pages\PageController@disableSection');
Route::post('enableSections', 'Cr\pages\PageController@enableSections');
Route::post('savePage', 'Cr\pages\PageController@savePage');
Route::post('addPage', 'Cr\pages\PageController@addPage');
Route::post('disablePage', 'Cr\pages\PageController@disablePage');
Route::post('enablePages', 'Cr\pages\PageController@enablePages');



