<?php

use Database\Seeders\EquipmentSeeder;

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\DatabaseMigrations::class,
)->in('Feature');

beforeEach(function() {
    $this->seed(EquipmentSeeder::class);
    $this->route = route('list');
});

it('can view equipments index page', function () {
    $response = $this->get($this->route);

    $response->assertStatus(200);
});
