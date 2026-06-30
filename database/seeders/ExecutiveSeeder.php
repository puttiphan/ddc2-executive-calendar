<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Executive;
use App\Models\Position;
use Illuminate\Database\Seeder;

class ExecutiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = Department::where('code', 'DIR')->firstOrFail();

        $position = Position::where('name', 'ผู้อำนวยการ')->firstOrFail();

        Executive::updateOrCreate(

            [
                'display_name' => 'นายผู้บริหาร ทดสอบ',
            ],

            [
                'user_id' => null,

                'department_id' => $department->id,

                'position_id' => $position->id,

                'prefix' => 'นาย',

                'first_name' => 'ผู้บริหาร',

                'last_name' => 'ทดสอบ',

                'display_name' => 'นายผู้บริหาร ทดสอบ',

                'email' => 'executive@ddc2.go.th',

                'phone' => '055000000',

                'calendar_color' => '#2563eb',

                'is_active' => true,
            ]

        );
    }
}