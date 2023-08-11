<?php

namespace SpotlightLogWatcher\Repositories;

use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;
use SpotlightLogWatcher\Models\LogWatcherTable;


/**
 * Repository for logging cart save actions
 */
class SpotlightLogWatcherLogRepository
{
    /**
     * creates a new log watcher with specified parameters
     * @param $watcherName
     * @param $level
     * @param $integration
     * @param $identifier
     * @param $referenceType
     * @param $referenceValue
     * @param $emailTitle
     * @param $sendTo
     * @param $bcc
     * @param $cronIntervall
     * @return \Exception|false|string
     */
    public function createLogWatcher(
        $watcherName,
        $level,
        $integration,
        $identifier,
        $referenceType,
        $referenceValue,
        $emailTitle,
        $sendTo,
        $bcc,
        $cronIntervall
    ) {
        $entry = pluginApp(LogWatcherTable::class);

        $entry->integration = $integration;
        $entry->identifier = $identifier;
        $entry->referenceType = $referenceType;
        $entry->referenceValue = $referenceValue;
        $entry->emailTitle = $emailTitle;
        $entry->sendTo = $sendTo;
        $entry->bcc = $bcc;
        $entry->cronIntervall = $cronIntervall;
        $entry->watcherName = $watcherName;
        $entry->lastRunAt = date('Y-m-d H:i:s', time());


        $entry->level = [];

        for ($i = 0; $i < sizeof($level); $i++) {
            $entry->level[] = $level[$i];
        }


        try {
            $database = pluginApp(DataBase::class);
            $database->save($entry);

            return json_encode($entry);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * deletes specified log watcher
     * @param $id
     * @return array
     */
    public function deleteLogWatcher($id)
    {
        if ($id > 0) {
            $database = pluginApp(DataBase::class);

            $entry = $database
                ->query(LogWatcherTable::class)
                ->where('id', '=', $id)
                ->get();

            try {
                $entry = $entry[0];

                if (isset($entry)) {
                    $database->delete($entry);

                    $action = "delete";
                    $message = "success";
                } else {
                    $action = "delete";
                    $message = "entry not set";
                }
            } catch (\Exception $exception) {
                $message = $exception;
                $action = "error";
            }
        } else {
            $action = 'error';
            $message = 'id < 1';
        }


        return ["action" => $action, "message" => $message];
    }

    /**
     * updates specified log watcher with new params
     * @param $id
     * @param $watcherName
     * @param $level
     * @param $integration
     * @param $identifier
     * @param $referenceType
     * @param $referenceValue
     * @param $emailTitle
     * @param $sendTo
     * @param $bcc
     * @param $cronIntervall
     * @return array|\Exception[]|false|string
     */
    public function updateLogWatcher(
        $id,
        $watcherName,
        $level,
        $integration,
        $identifier,
        $referenceType,
        $referenceValue,
        $emailTitle,
        $sendTo,
        $bcc,
        $cronIntervall
    ) {
        if ($id > 0) {
            $database = pluginApp(DataBase::class);

            $entry = $database->query(LogWatcherTable::class)->where('id', '=', $id)->get();
            try {
                $entry = $entry[0];

                if (isset($entry)) {
                    $entry->watcherName = $watcherName ? $watcherName : $entry->watcherName;
                    $entry->integration = $integration ? $integration : $entry->integration;
                    $entry->identifier = $identifier ? $identifier : $entry->identifier;
                    $entry->referenceType = $referenceType ? $referenceType : $entry->referenceType;
                    $entry->referenceValue = $referenceValue ? $referenceValue : $entry->referenceValue;
                    $entry->emailTitle = $emailTitle ? $emailTitle : $entry->emailTitle;
                    $entry->sendTo = $sendTo ? $sendTo : $entry->sendTo;
                    $entry->bcc = $bcc ? $bcc : $entry->bcc;
                    $entry->cronIntervall = $cronIntervall ? $cronIntervall : $entry->cronIntervall;


                    $entry->level = [];

                    for ($i = 0; $i < sizeof($level); $i++) {
                        $entry->level[] = $level[$i];
                    }

                    $database = pluginApp(DataBase::class);
                    $database->save($entry);
                    return json_encode($entry);
                } else {
                    return [];
                }
            } catch (\Exception$exception) {
                $message = $exception;
                $action = "error";

                return ["message" => $message];
            }
        } else {
            return [];
        }
    }
}


