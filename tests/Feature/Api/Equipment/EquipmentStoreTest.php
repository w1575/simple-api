<?php

use Database\Seeders\EquipmentTypeSeeder;

beforeEach(function() {
    $this->seed(EquipmentTypeSeeder::class);
    $this->apiRoute = route('store');
});

it('can store data in database', function (array $definition) {
    $response = $this->post($this->apiRoute, $definition);
    $response->assertStatus(200);
})->with('equipment_store_dataset');
