<?php

namespace SpotlightLogWatcher\Models;

use Plenty\Modules\Plugin\DataBase\Contracts\Model;

/**
 * Class LogWatcherTable
 *
 * @property int $id
 * @property array $level
 * @property string $watcherName
 * @property string $integration
 * @property string $identifier
 * @property string $referenceType
 * @property string $referenceValue
 * @property string $emailTitle
 * @property string $sendTo
 * @property string $bcc
 * @property string $cronIntervall
 * @property string $lastRunAt
 *
 */
class LogWatcherTable extends Model
{
    public $id = 0;
    public $watcherName = '';
    public $level = [];
    public $integration = '';
    public $identifier = '';
    public $referenceType = '';
    public $referenceValue = '';
    public $emailTitle = '';
    public $sendTo = '';
    public $bcc = '';
    public $lastRunAt = '';
    public $cronIntervall = '';

    public function getTableName(): string
    {
        return 'SpotlightLogWatcher::LogWatcherTable';
    }
}