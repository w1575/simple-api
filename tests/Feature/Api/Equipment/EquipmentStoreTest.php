<?php

use Database\Seeders\EquipmentTypeSeeder;

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\DatabaseMigrations::class,
)->in('Feature');

beforeEach(function() {
    $this->seed(EquipmentTypeSeeder::class);
    $this->apiRoute = route('store');
});

it('can store data in database', function (array $definition) {
    $response = $this->post($this->apiRoute, $definition);
    $response->assertStatus(201);
    $response->assertJsonCount(1, 'items');
    $response->assertJsonFragment(['errors' => NULL]);
})->with('equipment_store_dataset');

it('cant store data with wrong sn_number in database', function (array $definition) {
    dump($definition);
    $response = $this->post($this->apiRoute, $definition);
    $response->assertStatus(201);
    $response->assertJsonCount(1, 'items');
    $response->assertJsonMissing(['id' => 1]);
})->with('equipment_store_wrong_mask_dataset');


