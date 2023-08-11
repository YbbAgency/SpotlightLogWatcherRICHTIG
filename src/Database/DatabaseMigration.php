<?php

namespace SpotlightLogWatcher\Database;

use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;
use SpotlightLogWatcher\Models\LogWatcherTable;

/**
 * Class for migrating the set datatable
 */
class DatabaseMigration
{
    /**
     * runs migration for all dbs
     * @param Migrate $migrate
     */
    public function run(Migrate $migrate)
    {
        $migrate->createTable(LogWatcherTable::class);
    }
}