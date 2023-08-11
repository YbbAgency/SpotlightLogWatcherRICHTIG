<?php

namespace SpotlightLogWatcher\Providers;

use IO\Helper\ResourceContainer;
use IO\Helper\TemplateContainer;
use Plenty\Modules\Cron\Services\CronContainer;
use Plenty\Modules\ShopBuilder\Contracts\ContentWidgetRepositoryContract;
use Plenty\Plugin\Log\Loggable;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Templates\Twig;
use SpotlightLogWatcher\CronJobs\DeleteEmptyCron;
use SpotlightLogWatcher\CronJobs\EmailCron;
use SpotlightLogWatcher\CronJobs\LogCron;
use SpotlightLogWatcher\CronJobs\LogCronDaily;
use SpotlightLogWatcher\CronJobs\LogCronFifteen;
use SpotlightLogWatcher\CronJobs\LogCronHourly;
use SpotlightLogWatcher\CronJobs\StatisticCron;
use SpotlightLogWatcher\Extensions\Cart;
use SpotlightLogWatcher\Extensions\UserCarts;
use SpotlightLogWatcher\Widgets\CartSaveAddToListBtn;
use SpotlightLogWatcher\Widgets\CartSaveButtonAdd;
use SpotlightLogWatcher\Widgets\CartSaveMyAccount;
use SpotlightLogWatcher\Widgets\CartSaveShowList;
use SpotlightLogWatcher\Providers\SpotlightLogWatcherRouteServiceProvider;

/**
 * provider that registers the route map and  other php content ( crons / widgets etc )
 */
class SpotlightLogWatcherServiceProvider extends ServiceProvider
{
    use Loggable;

    /**
     * registers the route map
     */
    public function register()
    {
        $this->getApplication()->register(SpotlightLogWatcherRouteServiceProvider::class);
    }

    /**
     * registers scripts styles and other php content on boot
     * @param Twig $twig
     * @param Dispatcher $eventDispatcher
     * @param CronContainer $cronContainer
     */
    public function boot(Twig $twig, Dispatcher $eventDispatcher, CronContainer $cronContainer)
    {
        $eventDispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addScriptTemplate('SpotlightLogWatcher::Content.Scripts');
            $container->addStyleTemplate('SpotlightLogWatcher::Content.Styles');
        }, 0);

        $cronContainer->add(CronContainer::EVERY_FIFTEEN_MINUTES, LogCronFifteen::class);
        $cronContainer->add(CronContainer::HOURLY, LogCronHourly::class);
        $cronContainer->add(CronContainer::DAILY, LogCronDaily::class);
    }
}