<?php

namespace SpotlightLogWatcher\Controllers;

use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;
use Plenty\Plugin\Controller;
use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Log\Loggable;
use SpotlightLogWatcher\Models\LogWatcherTable;
use SpotlightLogWatcher\Repositories\SpotlightLogWatcherTableRepository;


/**
 * defines controller class with base controller fns
 */
class TableController extends Controller
{
    // * todo remove
    use Loggable;

    /**
     *  creates table by name
     */
    public function createTable($tableName, Migrate $migrate)
    {
        $table['success'] = false;

        if ($tableName == 'logs') {
            $table['success'] = $migrate->createTable(LogWatcherTable::class);
        }


        return $table;
    }

    public function migrateTable($tableName, Migrate $migrate)
    {
        $table['success'] = false;

        if ($tableName == 'logs') {
            $table['success'] = $migrate->updateTable(LogWatcherTable::class);
        }

        return $table;
    }

    /**
     *  deletes table by name
     */
    public function deleteTable($tableName, Migrate $migrate)
    {
        $table['success'] = false;

        if ($tableName == 'logs') {
            $table['success'] = $migrate->deleteTable(LogWatcherTable::class);
        }


        return ['table' => $table];
    }

    /**
     *  gets table by name
     */
    public function getTable($tableName, DataBase $dataBase)
    {
        $table = null;

        if ($tableName == 'logs') {
            $table = $dataBase->query(LogWatcherTable::class)->get();
        }

        return ['table' => $table];
    }

    /**
     * gets results for dynamic queries
     * @param Request $request
     * @return array
     */
    public function dynamicGet(Request $request)
    {
        $data = $request->all();

        $YbbCartSaveTableRepository = pluginApp(SpotlightLogWatcherTableRepository::class);

        $dynamicEntries = $YbbCartSaveTableRepository->getTableDynamic($data);

        return
            [
                "dynamicEntries" => $dynamicEntries,
            ];
    }
}