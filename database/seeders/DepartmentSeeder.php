<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [

            [
                'code' => 'DIR',
                'name' => 'สำนักงานผู้อำนวยการ',
                'short_name' => 'ผอ.',
                'is_active' => true,
            ],

            [
                'code' => 'ADM',
                'name' => 'กลุ่มอำนวยการ',
                'short_name' => 'อก.',
                'is_active' => true,
            ],

            [
                'code' => 'IT',
                'name' => 'กลุ่มเทคโนโลยีสารสนเทศ',
                'short_name' => 'IT',
                'is_active' => true,
            ],

            [
                'code' => 'EPI',
                'name' => 'กลุ่มระบาดวิทยา',
                'short_name' => 'ระบาด',
                'is_active' => true,
            ],

            [
                'code' => 'LAB',
                'name' => 'กลุ่มห้องปฏิบัติการ',
                'short_name' => 'LAB',
                'is_active' => true,
            ],

        ];

        foreach ($departments as $department) {

            Department::updateOrCreate(
                ['code' => $department['code']],
                $department
            );

        }
    }
}