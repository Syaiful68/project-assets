<?php

namespace Database\Seeders;

use App\Models\origin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data = [
            [
                'origin_name' => 'Toba Samosir',
                'origin_code' => 'DTB10000'
            ],
            [
                'origin_name' => 'Gunung Sitoli',
                'origin_code' => 'DTB20100'
            ],
            [
                'origin_name' => 'Nias Selatan',
                'origin_code' => 'DTB20200'
            ],
            [
                'origin_name' => 'Nias Utara',
                'origin_code' => 'DTB20300'
            ],
            [
                'origin_name' => 'Nias Barat',
                'origin_code' => 'DTB20106'
            ],
            [
                'origin_name' => 'Sibolga',
                'origin_code' => 'DTB20400'
            ],
            [
                'origin_name' => 'Padang Sidempuan',
                'origin_code' => 'DTB20500'
            ],
        ];

        foreach ($data as $key => $value) {
            origin::create($value);
        }
    }
}
