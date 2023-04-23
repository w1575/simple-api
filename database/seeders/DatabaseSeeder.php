<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->callWith(EquipmentTypeSeeder::class);
        $this->callWith(EquipmentSeeder::class, ['count' => 25]);
    }
}
