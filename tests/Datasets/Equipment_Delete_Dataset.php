<?php

use App\Models\Equipment;

dataset('equipment_delete_dataset_not_deleted_record', function () {
    yield [
        'notDeletedId' => fn () => Equipment::withoutTrashed()->firstOrFail()->id,
    ];
});
