<?php

use App\Models\Equipment;
use Database\Seeders\DatabaseSeeder;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(\Illuminate\Foundation\Testing\DatabaseMigrations::class);

beforeEach(function() {
    $this->routeName = 'update';
    $this->seed(DatabaseSeeder::class);
});

it('cant edit item that does not exist', function (int $id, array $data) {
    /** @var Tests\TestCase $this */
    $response = $this->put(route($this->routeName, ['id' => $id,]), $data);
    $response->assertStatus(404);
})->with('equipment_edit_dataset_wrong_id');

it('can edit item that does exist', function (Equipment $equipment, array $data) {
    /** @var Tests\TestCase $this */
    $response = $this->put(route($this->routeName, ['id' => $equipment->id,]), $data);
    $response->assertStatus(200);

    expect($response)->assertJsonFragment(['comment' => $data['comment']]);
    assertDatabaseHas('equipments', ['id' => $equipment->id, 'equipment_type_id' => $data['equipment_type_id']]);
    assertDatabaseMissing('equipments', ['id' => $equipment->id, 'equipment_type_id' => $equipment->equipment_type_id]);
})->with('equipment_edit_dataset');
