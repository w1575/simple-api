<?php

use Database\Seeders\DatabaseSeeder;

use Illuminate\Foundation\Testing\DatabaseMigrations;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(
    DatabaseMigrations::class,
);

beforeEach(function() {
    $this->routeName = 'delete';
    $this->seed(DatabaseSeeder::class);
});

it('can equipment delete page', function () {
    /** @var \Tests\TestCase $this */
    $response = $this->delete(route($this->routeName, ['id' => 1575]));
    $response->assertStatus(404);
    $response->assertJsonFragment(['message' => "Record does not exist"]);
});

it('can delete item that exist', function (int $notDeletedId) {
    /** @var \Tests\TestCase $this */
    assertDatabaseHas('equipments', ['id' => $notDeletedId, 'deleted_at' => null]);
    $response = $this->delete(route($this->routeName, ['id' => $notDeletedId]));
    assertDatabaseMissing('equipments', ['id' => $notDeletedId, 'deleted_at' => null]);
    $response->assertStatus(200);
    $response->assertJsonFragment(['success' => true]);
})->with('equipment_delete_dataset_not_deleted_record');
