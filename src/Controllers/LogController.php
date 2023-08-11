<?php

namespace SpotlightLogWatcher\Controllers;


use Plenty\Log\Search\Contracts\LogRepositoryContract;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use SpotlightLogWatcher\Repositories\SpotLightLogWatcherCronRepository;
use SpotlightLogWatcher\Repositories\SpotlightLogWatcherLogRepository;


/**
 * defines controller class with base controller fns
 */
class LogController extends Controller
{
    public function mandantTest($mandantId)
    {
        $logRepo = pluginApp(LogRepositoryContract::class);
        $logs = $logRepo->search(1, 5, [["plentyId" => $mandantId]], "createdAt", "desc", ['additionalInfo'])->toArray(
        );

        return $logs;
    }

    public function testCron($int)
    {
        $SpotLightLogWatcherCronRepository = pluginApp(SpotLightLogWatcherCronRepository::class);

        return $SpotLightLogWatcherCronRepository->findWatcher($int);
    }

    /**
     * calls repository function that creates a new watcher
     * @param Request $request
     * @return mixed
     */
    public function createLogWatcher(Request $request)
    {
        $reqData = $request->all();
        $LogRepositoryContract = pluginApp(SpotlightLogWatcherLogRepository::class);

        $watcherName = $reqData["watcherName"] ? $reqData["watcherName"] : '';
        $level = $reqData["level"] ? $reqData["level"] : [];
        $integration = $reqData["integration"] ? $reqData["integration"] : '';
        $identifier = $reqData["identifier"] ? $reqData["identifier"] : '';
        $referenceType = $reqData["referenceType"] ? $reqData["referenceType"] : '';
        $referenceValue = $reqData["referenceValue"] ? $reqData["referenceValue"] : '';
        $emailTitle = $reqData["emailTitle"] ? $reqData["emailTitle"] : '';
        $sendTo = $reqData["sendTo"] ? $reqData["sendTo"] : '';
        $bcc = $reqData["bcc"] ? $reqData["bcc"] : '';
        $cronIntervall = $reqData["cronIntervall"] ? $reqData["cronIntervall"] : '';

        return $LogRepositoryContract->createLogWatcher(
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
        );
    }

    /**
     * calls repository function that updates specified watcher
     * @param Request $request
     * @return mixed
     */
    public function updateLogWatcher(Request $request)
    {
        $reqData = $request->all();
        $LogRepositoryContract = pluginApp(SpotlightLogWatcherLogRepository::class);

        $id = intval($reqData["id"]);
        $watcherName = $reqData["watcherName"];
        $level = $reqData["level"];
        $integration = $reqData["integration"];
        $identifier = $reqData["identifier"];
        $referenceType = $reqData["referenceType"];
        $referenceValue = $reqData["referenceValue"];
        $emailTitle = $reqData["emailTitle"];
        $sendTo = $reqData["sendTo"];
        $bcc = $reqData["bcc"];
        $cronIntervall = $reqData["cronIntervall"];
        $lastRunAt = $reqData["lastRunAt"];

        return $LogRepositoryContract->updateLogWatcher(
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
            $cronIntervall,
            $lastRunAt
        );
    }

    /**
     * calls repository function that deletes specified watcher
     * @param $id
     * @return mixed
     */
    public function deleteLogWatcher($id)
    {
        $LogRepositoryContract = pluginApp(SpotlightLogWatcherLogRepository::class);
        return $LogRepositoryContract->deleteLogWatcher($id);
    }
}
