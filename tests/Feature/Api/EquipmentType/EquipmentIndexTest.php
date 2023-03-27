<?php

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature');

beforeEach(function() {
    $this->apiRoute = route('types-list');
    $this->seed(\Database\Seeders\EquipmentTypeSeeder::class);
});

it('has equipment list page', function () {
    $response = $this->get($this->apiRoute);

    $response->assertStatus(200);
});
