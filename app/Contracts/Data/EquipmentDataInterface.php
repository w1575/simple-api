<?php

namespace App\Contracts\Data;

use DateTime;

/**
 * @property int id
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property DateTime deleted_at
 * @property int equipment_type_id
 * @property string serial_number
 * @property string comment
 * @property EquipmentTypeDataInterface $equipment_type
 */
interface EquipmentDataInterface extends BaseDataInterface
{
}
