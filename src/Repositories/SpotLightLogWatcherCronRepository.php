<?php

namespace SpotlightLogWatcher\Repositories;

use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;
use SpotlightLogWatcher\Repositories\SpotlightLogWatcherEmailRepository;
use SpotlightLogWatcher\Repositories\SpotlightLogWatcherTableRepository;
use Plenty\Log\Search\Contracts\LogRepositoryContract;
use Plenty\Plugin\Log\Loggable;
use Plenty\Modules\System\Contracts\WebstoreRepositoryContract;

/**
 * creates repository
 */
class SpotLightLogWatcherCronRepository
{
    use Loggable;

    /**
     * find log watcher for specified intervall
     * @param $intervall
     * @return array
     */
    public function findWatcher($intervall)
    {
        $SpotlightLogWatcherTableRepository = pluginApp(SpotlightLogWatcherTableRepository::class);

        $data = [
            "db" => "logs",
            "itemsPerPage" => 100,
            "page" => 1,
            "orderBy" => "id",
            "orderDesc" => "desc",
            "filter" => [
                [
                    "where" => "cronIntervall",
                    "operator" => '=',
                    "value" => $intervall
                ]
            ]
        ];

        $LogWatchers = $SpotlightLogWatcherTableRepository->getTableDynamic($data);

        $entries = $LogWatchers["entries"];

        $emailRepo = pluginApp(SpotlightLogWatcherEmailRepository::class);

        $returnData = [];

        if (isset($entries) && sizeof($entries) > 0) {
            for ($i = 0; $i < sizeof($entries); $i++) {
                $results = self::findLogs($entries[$i]);

                if (sizeof($results) > 0) {
                    $body = self::buildEmailBody($results, $entries[$i]->watcherName, $entries[$i]->lastRunAt);

                    $emailReturn = $emailRepo->sendEmail(
                        $entries[$i]->sendTo,
                        $entries[$i]->bcc,
                        $entries[$i]->emailTitle,
                        $body
                    );

                    $returnData[] =
                        [
                            "body" => $body,
                            "emailReturn" => $emailReturn,
                            "sendTo" => $entries[$i]->sendTo
                        ];
                }

                $entries[$i]->lastRunAt = date('Y-m-d H:i:s', time());
                $database = pluginApp(DataBase::class);
                $database->save($entries[$i]);
            }
        }

        return $returnData;
    }

    /**
     * build email data from log results and watcher data
     * @param $logResults
     * @param $watcherName
     * @param $timeFrom
     * @return string
     */
    public function buildEmailBody($logResults, $watcherName, $timeFrom)
    {
        $body = '';
        $totalCount = 0;

        $WebstoreRepositoryContract = pluginApp(WebstoreRepositoryContract::class);

        for ($i = 0; $i < sizeof($logResults); $i++) {
            $totalCount = $totalCount + $logResults[$i]["totalCount"];

            $addInfo = $logResults[$i]["entries"][0]["additionalInfo"];

            if (strlen($addInfo) >= 1500) {
                $addInfo = substr(
                        $logResults[$i]["entries"][0]["additionalInfo"],
                        0,
                        1500
                    ) . ' message has been trimed because it was over 1500 characters long';
            }

            $body = $body .
                '<b><br>Meldungs-Level: ' . $logResults[$i]["level"] .
                '<br>Anzahl an Meldungen: ' . $logResults[$i]["totalCount"] .
                '<br> Meldung: ' . $logResults[$i]["entries"][0]["code"] . ' | ' . $addInfo . '<br> ';
        }

        $body = "Alle Meldungen für ihren Log Watcher <b>" . $watcherName . " </b> <br> für den Zeiraum " . $timeFrom . ' - ' . date(
                'Y-m-d H:i:s',
                time()
            ) . " :<br> Insgesamte Meldungen für diesen Zeitraum:<b>" . $totalCount . '</b></b><br>' . $body;

        return $body;
    }

    /**
     * filters and finds logs fora specified watcher
     * @param $watcher
     * @return array
     */
    public function findLogs($watcher)
    {
        $logRepo = pluginApp(LogRepositoryContract::class);

        $results = [];

        $filter = [

        ];

        if (strlen($watcher->referenceValue) > 0) {
            $filter["referenceValue"] = $watcher->referenceValue;
        }
        if (strlen($watcher->referenceType) > 0) {
            $filter["referenceType"] = $watcher->referenceType;
        }
        $filter["fromDate"] = $watcher->lastRunAt;
        if (strlen($watcher->identifier) > 0) {
            $filter["referenceValue"] = [str_replace("\\\\", "\\", $watcher->identifier)];
        }
        if (strlen($watcher->integration) > 0) {
            $filter["integration"] = [str_replace("\\\\", "\\", $watcher->integration)];
        }


        for ($i = 0; $i < sizeof($watcher->level); $i++) {
            $level = $watcher->level[$i];

            $filter["level"] = $level;

            $this->getLogger('logwatch')->alert('log watch cron filter', ["filter" => $filter]);

            $logs = $logRepo->search(1, 1, $filter, "createdAt", "desc", ['additionalInfo'])->toArray();

            if (sizeof($logs["entries"]) > 0) {
                $results[] =
                    [
                        "level" => $level,
                        "totalCount" => $logs["totalsCount"],
                        "entries" => $logs["entries"]
                    ];
            }
        }

        return $results;
    }

}
