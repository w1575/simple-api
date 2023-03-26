<?php

uses(
    Tests\TestCase::class,
// Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature');

it('has equipment list page', function () {
    $response = $this->get(route('list'));

    $response->assertStatus(200);
});

it('can paginate', function () {

});
