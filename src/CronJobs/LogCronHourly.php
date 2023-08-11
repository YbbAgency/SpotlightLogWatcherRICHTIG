<?php

namespace SpotlightLogWatcher\CronJobs;

use Plenty\Modules\Cron\Contracts\CronHandler;
use SpotlightLogWatcher\Repositories\SpotLightLogWatcherCronRepository;
use SpotlightLogWatcher\Repositories\SpotlightLogWatcherLogRepository;


/**
 * creates cron
 */
class LogCronHourly extends CronHandler
{
    /**
     * call repository function that finds watcher with specific intervall
     */
    public function handle()
    {
        $SpotLightLogWatcherCronRepository = pluginApp(SpotLightLogWatcherCronRepository::class);
        $SpotLightLogWatcherCronRepository->findWatcher("Stündlich");
    }
}