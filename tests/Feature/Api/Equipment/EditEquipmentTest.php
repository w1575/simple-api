<?php

use Database\Seeders\DatabaseSeeder;

uses(\Illuminate\Foundation\Testing\DatabaseMigrations::class);

beforeEach(function() {
    $this->routeName = 'update';
    $this->seed(DatabaseSeeder::class);
});

it('cant edit item that does not exist', function (int $id) {
    /** @var Tests\TestCase $this */
    $response = $this->put(route($this->routeName, ['id' => $id]));
    $response->dd();
    $response->assertStatus(404);
    $response->assertJsonFragment(['message' => 'Record not found']);
})->with('equipment_edit_dataset_wrong_id');
