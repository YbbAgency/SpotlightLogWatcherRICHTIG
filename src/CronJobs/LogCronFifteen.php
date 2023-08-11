<?php

namespace SpotlightLogWatcher\CronJobs;

use Plenty\Modules\Cron\Contracts\CronHandler;
use SpotlightLogWatcher\Repositories\SpotLightLogWatcherCronRepository;


/**
 * creates cron
 */
class LogCronFifteen extends CronHandler
{
    /**
     * call repository function that finds watcher with specific intervall
     */
    public function handle()
    {
        $SpotLightLogWatcherCronRepository = pluginApp(SpotLightLogWatcherCronRepository::class);
        $SpotLightLogWatcherCronRepository->findWatcher("alle 15 Minuten");
    }
}