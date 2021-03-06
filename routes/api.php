<?php


//Route::group(['middleware' => 'cors'], function ()
Route::group([], function ()
{
    $api = app('Dingo\Api\Routing\Router');
    $api->version('v1', ['middleware' => 'api.auth'], function ($api)
    {
        $api->group(['namespace' => 'Topicmine\DataTables\Controllers'], function ($api)
        {
//            this is for the top search bar - still to do
//            $api->get('search', 'ApiDataController@search')
//                ->name('api.data.search');

            $api->post('authenticate', 'ApiDataController@authenticate');

            $api->get('data', 'ApiDataController@index')
                ->name('api.data.index');

            $api->post('data/action', 'ApiDataController@action')
                ->name('api.data.action');

            $api->get('data/create', 'ApiDataController@create')
                ->name('api.data.create');

            $api->get('data/{id}/edit', 'ApiDataController@edit')
                ->name('api.data.edit');

//        no show routes are linked at the moment so commented out
//        $api->get('data/{id}', 'ApiDataController@show')
//            ->name('api.data.show');

            $api->post('data', 'ApiDataController@store')
                ->name('api.data.store');
//
            $api->delete('data/{id}', 'ApiDataController@destroy')
                ->name('api.data.destroy');
//
            $api->put('data/{id}', 'ApiDataController@update')
                ->name('api.data.update');
        });
    });
});
