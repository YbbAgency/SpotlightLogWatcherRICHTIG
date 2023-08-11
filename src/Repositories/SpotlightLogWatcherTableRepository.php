<?php

namespace SpotlightLogWatcher\Repositories;

use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;
use SpotlightLogWatcher\Database\DatabaseMigration;
use SpotlightLogWatcher\Models\LogWatcherTable;

/**
 * creates repository for easy access on tables
 */
class SpotlightLogWatcherTableRepository
{
    /**
     * gets table results dynamically
     */
    public function getTableDynamic($data)
    {
        $database = pluginApp(DataBase::class);

        $databaseName = $data['db'];
        $itemsPerPage = $data['itemsPerPage'] ? $data['itemsPerPage'] : 20;
        $page = $data['page'] ? ($data['page']) : 1;
        $orderBy = $data['orderBy'] ? ($data['orderBy']) : 'id';
        $orderDesc = $data['orderDesc'] ? $data['orderDesc'] : 'desc';
        $filter = $data['filter'] ? $data['filter'] : [];

        if ($databaseName == 'logs') {
            $myDataBase = $database->query(LogWatcherTable::class);
        }

        for ($i = 0; $i < sizeof($filter); $i++) {
            $myDataBase->where($filter[$i]['where'], $filter[$i]['operator'], $filter[$i]['value']);
        }

        $itemsTotal = $myDataBase->count();
        $pages = ceil($itemsTotal / $itemsPerPage);

        $entries = $myDataBase->orderBy($orderBy, $orderDesc)->forPage($page, $itemsPerPage)->get();

        return
            [
                "pages" => $pages,
                "itemsTotal" => $itemsTotal,
                "entries" => $entries
            ];
    }
}