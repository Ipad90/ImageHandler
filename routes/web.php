<?php

Route::get('/', 'ImageController@index');

Route::get('/{album}', 'ImageController@showAlbum');

Route::get('/{album}/{name}', 'ImageController@showImage');
