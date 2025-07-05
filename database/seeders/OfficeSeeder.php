<?php

namespace Database\Seeders;

use App\Models\office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'origin_id' => 1,
                'office_name' => 'KP BALIGE'
            ],
            [
                'origin_id' => 2,
                'office_name' => 'KP GUNUNG SITOLI'
            ],
            [
                'origin_id' => 3,
                'office_name' => 'KP TELUK DALAM'
            ],
        ];

        foreach ($data as $key => $value) {
            # code...
            office::create($value);
        }
    }
}
