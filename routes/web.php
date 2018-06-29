<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/', function () use ($router) {
    // return $router->app->version();
    return view('list-api');
});

$router->group(['prefix' => 'api/v1', 'namespace' => 'Api'], function () use ($router) {

    $router->get('menu/list', [
        'uses' => 'MenuController@getMenuList',
        'as' => 'get.menu.list', 
    ]);

    $router->group(['prefix' => 'news'], function () use ($router) {
    	$router->get('latest', [
    	    'uses' => 'NewsController@getNewsLatest',
    	    'as' => 'get.news.latest', 
    	]);

    	$router->get('hot', [
    	    'uses' => 'NewsController@getNewsHot',
    	    'as' => 'get.news.hot', 
    	]);

    	$router->get('detail', [
    	    'uses' => 'NewsController@getNewsDetail',
    	    'as' => 'get.news.detail', 
    	]);
    });
    
    $router->get('search/word', [
        'uses' => 'SearchController@getSearchWord',
        'as' => 'get.search.word', 
    ]);

});