<?php

namespace App\Contracts\Data;

use DateTime;

/**
 * @property int id
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property DateTime deleted_at
 * @property string sn_mask
 * @property string type
 */
interface EquipmentTypeDataInterface extends BaseDataInterface
{
}
