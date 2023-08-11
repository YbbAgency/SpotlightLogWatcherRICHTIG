<?php

namespace SpotlightLogWatcher\Repositories;

use Plenty\Plugin\Mail\Contracts\MailerContract;

/**
 * creates email repository
 */
class SpotlightLogWatcherEmailRepository
{

    /**
     * sends an email with specified params
     * @param $sendTo
     * @param $bcc
     * @param $emailTitle
     * @param $body
     * @return array|false
     */
    public function sendEmail($sendTo, $bcc, $emailTitle, $body)
    {
        $dataForTwig = [
            "body" => $body,
        ];

        $mailer = pluginApp(MailerContract::class);

        if (strlen($sendTo) > 0) {
            try {
                return $mailer->sendFromTwig(
                    "SpotlightLogWatcher::WatcherMail",
                    $dataForTwig,
                    $sendTo,
                    $emailTitle,
                    [],
                    [],
                    $bcc,
                    null,
                    []
                );
            } catch (\Exception $exception) {
                return ["wasSent" => false, "exception" => $exception];
            }
        } else {
            return false;
        }
    }
}