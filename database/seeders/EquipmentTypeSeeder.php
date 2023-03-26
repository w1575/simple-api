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
//                'id' => 1,
                'type' => 'TP-Link TL-WR74',
                'sn_mask' => 'NAaXZNAaXZ',
            ],
            [
//                'id' => 2,
                'type' => 'TP-Link TL-WR74',
                'sn_mask' => 'NAaXZNAaXZ',
            ],
            [
//                'id' => 3,
                'type' => 'TP-Link DD-RR74',
                'sn_mask' => 'AAANNNxZZ',
            ],
            [
//                'id' => 4,
                'type' => 'D-Link DIR-300 E',
                'sn_mask' => 'XXAAAAAXAA',
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
