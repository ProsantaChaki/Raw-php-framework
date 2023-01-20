<?php

require 'app/Helpers/Route.php';
require 'app/Controllers/InventoryController.php';

use App\Helpers\Route;

Route::get('/', 'InventoryController@index');
Route::post('/add-item', 'InventoryController@addItem');
Route::post('/remove-item', 'InventoryController@removeItem');
Route::get('/get-item', 'InventoryController@getStock');
