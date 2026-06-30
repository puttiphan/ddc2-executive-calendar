<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            ['name' => 'ประชุม',       'color' => '#2563eb'],
            ['name' => 'ตรวจราชการ',  'color' => '#16a34a'],
            ['name' => 'อบรม',         'color' => '#ea580c'],
            ['name' => 'สัมมนา',       'color' => '#9333ea'],
            ['name' => 'ลาพัก',        'color' => '#dc2626'],
            ['name' => 'ภารกิจ',       'color' => '#0891b2'],
            ['name' => 'อื่น ๆ',       'color' => '#6b7280'],

        ];

        $sort = 1;

        foreach ($categories as $category) {

            EventCategory::updateOrCreate(

                ['name' => $category['name']],

                [
                    'icon' => null,
                    'color' => $category['color'],
                    'sort_order' => $sort++,
                    'is_active' => true,
                ]

            );

        }
    }
}