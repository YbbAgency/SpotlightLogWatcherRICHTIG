<?php

namespace SpotlightLogWatcher\Repositories;

use Plenty\Modules\Order\Coupon\Campaign\Contracts\CouponCampaignRepositoryContract;
use Plenty\Modules\System\Contracts\WebstoreRepositoryContract;
use Plenty\Modules\Webshop\Contracts\WebstoreConfigurationRepositoryContract;
use Plenty\Plugin\Log\Loggable;
use SpotlightLogWatcher\Repositories\SpotlightLogWatcherTableRepository;

/**
 * Repository for initializing and changing data in the UI
 */
class SpotlightLogWatcherUiRepository
{
    /**
     *  function that collects the data that is required to initialize the ui
     * @return array
     */
    public function getUiData()
    {
        $tableRepository = pluginApp(SpotlightLogWatcherTableRepository::class);
        $logData = [
            'db' => 'logs',
            'itemsPerPage' => 100,
            'page' => 1,
            "orderBy" => 'id',
            "orderDesc" => 'desc',
            'filter' => []
        ];

        $webStoreContract = pluginApp(WebstoreRepositoryContract::class);

        $webStoreConfig = $webStoreContract->loadAll();


        $logs = $tableRepository->getTableDynamic($logData);

        return [
            "webStoreConfig" => $webStoreConfig,
            "logs" => $logs
        ];
    }
}