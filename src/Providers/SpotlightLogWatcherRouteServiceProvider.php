<?php

namespace SpotlightLogWatcher\Providers;

use Plenty\Plugin\Log\Loggable;
use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\ApiRouter;
use Plenty\Plugin\Routing\Router;

/**
 * Provider that defines routes that are called in the plugin
 */
class SpotlightLogWatcherRouteServiceProvider extends RouteServiceProvider
{
    use Loggable;

    public function register()
    {
    }

    /**
     * default route maping function
     * @param Router $router
     * @param ApiRouter $apiRouter
     */
    public function map(Router $router, ApiRouter $apiRouter)
    {
        $apiRouter->version(['v1'],
            ['namespace' => 'SpotlightLogWatcher\Controllers', 'middleware' => 'oauth'],
            function ($apiRouter) {
                //todo remove
                /** Tables */
                $apiRouter->get('SpotlightLogWatcher/table/create/{name}/', 'TableController@createTable');
                $apiRouter->get('SpotlightLogWatcher/table/delete/{name}/', 'TableController@deleteTable');
                $apiRouter->get('SpotlightLogWatcher/table/migrate/{name}/', 'TableController@migrateTable');
                $apiRouter->get('SpotlightLogWatcher/table/get/{name}/', 'TableController@getTable');
                $apiRouter->post('SpotlightLogWatcher/table/dynamicGet/', 'TableController@dynamicGet');

                /** Emails */
                $apiRouter->post('SpotlightLogWatcher/email/sendEmail/', 'EmailController@sendEmail');

                /** UI */
                $apiRouter->post('SpotlightLogWatcher/ui/createLogWatcher/', 'LogController@createLogWatcher');
                $apiRouter->post('SpotlightLogWatcher/ui/updateLogWatcher/', 'LogController@updateLogWatcher');
                $apiRouter->get('SpotlightLogWatcher/ui/deleteLogWatcher/{id}', 'LogController@deleteLogWatcher');
                $apiRouter->post('SpotlightLogWatcher/ui/getUiData/', 'UiController@getUiData');
                //remove

                $apiRouter->get('SpotlightLogWatcher/ui/mandantTest/{int}', 'LogController@mandantTest');
                $apiRouter->get('SpotlightLogWatcher/ui/testCron/{int}', 'LogController@testCron');
            }
        );
    }
}