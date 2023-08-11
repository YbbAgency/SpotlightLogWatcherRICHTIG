<?php

namespace SpotlightLogWatcher\Models;

use Plenty\Modules\Plugin\DataBase\Contracts\Model;

/**
 * Class LogsToWatch
 *
 * @property int $id
 * @property string $level
 * @property string $integration
 * @property string $identifier
 * @property string $referenceType
 * @property string $referenceValue
 * @property int $mandant
 * @property string $emailTitle
 * @property string $emailBody
 *
 */
class LogsToWatch extends Model
{
    public $id = 0;
    public $level = '';
    public $integration = '';
    public $identifier = '';
    public $referenceType = '';
    public $referenceValue = '';
    public $mandant = 0;
    public $emailTitle = '';
    public $emailBody = '';

    public function getTableName(): string
    {
        return 'SpotlightLogWatcher::LogsToWatch';
    }
}