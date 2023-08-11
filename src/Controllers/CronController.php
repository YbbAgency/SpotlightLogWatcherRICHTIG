<?php

namespace SpotlightLogWatcher\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use SpotlightLogWatcher\Repositories\SpotlightLogWatcherCronRepository;

/**
 * defines controller class with base controller fns
 */
class CronController extends Controller
{
    /**
     * updates the cron Data used for sending emails
     * @param Request $request
     * @return mixed
     */
    public function updateCronData(Request $request)
    {
        $SpotlightLogWatcherCronRepository = pluginApp(SpotlightLogWatcherCronRepository::class);

        $requestData = $request->all();


        return $SpotlightLogWatcherCronRepository->updateCronData();
    }

}