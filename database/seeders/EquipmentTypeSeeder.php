<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipment_types')->insert([
            [
                'type' => 'TP-Link TL-WR74',
                'sn_mask' => 'NAaXZNAaXZ',
            ],
            [
                'type' => 'TP-Link TL-WR74',
                'sn_mask' => 'NAaXZNAaXZ',
            ],
            [
                'type' => 'TP-Link DD-RR74',
                'sn_mask' => 'AAANNNXZZ',
            ],
            [
                'type' => 'D-Link DIR-300 E',
                'sn_mask' => 'XXAAAAAXAA',
            ],
            [
                'type' => 'D-Link DIR-156 E',
                'sn_mask' => 'ZXXAAAAAXA',
            ],
            // Где:
            //  N – цифра от 0 до 9;
            //  A – прописная буква латинского алфавита;
            //  a – строчная буква латинского алфавита;
            //  X – прописная буква латинского алфавита либо цифра от 0 до 9;
            //  Z –символ из списка: “-“, “_”, “@”.
        ]);
    }
}
