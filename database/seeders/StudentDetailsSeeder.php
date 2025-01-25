<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('studentdetails')->insert([
            [
                'first_name' => 'John',
                'middle_name' => 'A',
                'last_name' => 'Doe',
                'mobile_number' => '9876543210',
                'email' => 'john.doe@example.com',
                'city' => 'Pune',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'middle_name' => 'B',
                'last_name' => 'Smith',
                'mobile_number' => '9123456789',
                'email' => 'jane.smith@example.com',
                'city' => 'Mumbai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Robert',
                'middle_name' => 'C',
                'last_name' => 'Brown',
                'mobile_number' => '9871234560',
                'email' => 'robert.brown@example.com',
                'city' => 'Delhi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Emily',
                'middle_name' => 'D',
                'last_name' => 'Johnson',
                'mobile_number' => '8765432109',
                'email' => 'emily.johnson@example.com',
                'city' => 'Bangalore',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
