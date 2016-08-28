Route::get('/material_units/', ['as' => 'material_units', 'uses' => 'MaterialUnitsController@index']);
Route::get('/material_units/create', ['as' => 'material_units.create', 'uses' => 'MaterialUnitsController@create', 'middleware' => ['acl:material_units.create']]);
Route::get('/material_units/{id}/show', ['as' => 'material_units.show', 'uses' => 'MaterialUnitsController@show', 'middleware' => ['acl:material_units.show']]);
Route::get('/material_units/{id}/edit', ['as' => 'material_units.edit', 'uses' => 'MaterialUnitsController@edit', 'middleware' => ['acl:material_units.edit']]);
Route::get('/material_units/{id}/destroy', ['as' => 'material_units.destroy', 'uses' => 'MaterialUnitsController@destroy', 'middleware' => ['acl:material_units.destroy']]);
Route::put('/material_units/{id}/update', ['as' => 'material_units.update', 'uses' => 'MaterialUnitsController@update']);
Route::post('/material_units', ['as' => 'material_units.store', 'uses' => 'MaterialUnitsController@store']);