<?php

namespace SpotlightLogWatcher\Controllers;

use Plenty\Plugin\Controller;
use SpotlightLogWatcher\Controllers;
use Plenty\Plugin\Http\Request;
use SpotlightLogWatcher\Repositories\SpotlightLogWatcherUiRepository;

/**
 * defines controller class with base controller fns
 */
class UiController extends Controller
{
    /**
     * calls repository function that collects the data that is required to initialize the ui
     * @return mixed
     */
    public function getUiData()
    {
        $SpotlightLogWatcherUiRepository = pluginApp(SpotlightLogWatcherUiRepository::class);

        $uiData = $SpotlightLogWatcherUiRepository->getUiData();

        return $uiData;
    }
}