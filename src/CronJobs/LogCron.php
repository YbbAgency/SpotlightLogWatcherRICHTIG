<?php

namespace SpotlightLogWatcher\CronJobs;

use Plenty\Modules\Cron\Contracts\CronHandler;
use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;


/**
 * creates cron
 */
class LogCron extends CronHandler
{
    public function handle()
    {
        $db = pluginApp(DataBase::class);
        //return $LogRepositoryContract->search($page,$itemsPerPage,$filters,$sortBy,$sortOrder,$with);
    }
}