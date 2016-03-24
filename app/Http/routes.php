<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //show all recipe
    Route::get('/recipe', ['as' => 'recipe.index', 'uses' => 'ControllerRecipe@index']);
    
    //show single recipes
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    //search recipe
    Route::post('/recipe/search', ['as' => 'queries.search', 'uses' => 'ControllerRecipe@search']);
    
    //create recipe
    Route::get('/recipe/create', ['as' => 'recipe.create', 'uses' => 'ControllerRecipe@create']);
    
    //store recipe
    Route::post('/recipe', ['as' => 'recipe.store', 'uses' => 'ControllerRecipe@store']);
    
    //show single recipe
    Route::get('/recipe/{id}', ['as' => 'recipe.show', 'uses' => 'ControllerRecipe@show']);
    
    //modify recipe
    Route::get('/recipe/{id}/edit', ['as' => 'recipe.edit', 'uses' => 'ControllerRecipe@edit']);
    
    //update recipe
    Route::put('/recipe/{id}', ['as' => 'recipe.update', 'uses' => 'ControllerRecipe@update']);
    
    //delete recipe
    Route::delete('/recipe/{id}', ['as' => 'recipe.destroy', 'uses' => 'ControllerRecipe@destroy']);
});
