<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [

            [
                'name'  => 'ผู้อำนวยการ',
                'level' => 1,
            ],

            [
                'name'  => 'รองผู้อำนวยการ',
                'level' => 2,
            ],

            [
                'name'  => 'หัวหน้ากลุ่ม',
                'level' => 3,
            ],

            [
                'name'  => 'นักวิชาการ',
                'level' => 4,
            ],

        ];

        foreach ($positions as $position) {

            Position::updateOrCreate(
                ['name' => $position['name']],
                $position
            );

        }
    }
}