<?php

it('has api/equipment/equipmentindex page', function () {
    $response = $this->get('/api/equipment/equipmentindex');

    $response->assertStatus(200);
});
