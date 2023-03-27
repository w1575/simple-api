<?php

use App\Models\Equipment;

dataset('equipment_store_dataset', function () {
    yield fn() => Equipment::factory()->definition();
});
