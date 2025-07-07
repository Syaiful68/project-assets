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
                'origin_name' => 'TOBA SAMOSIR',
                'origin_code' => 'DTB10000'
            ],
            [
                'origin_name' => 'GUNUNG SITOLI',
                'origin_code' => 'DTB20100'
            ],
            [
                'origin_name' => 'TELUK DALAM',
                'origin_code' => 'DTB20200'
            ],
            [
                'origin_name' => 'LAHEWA',
                'origin_code' => 'DTB20300'
            ],
            [
                'origin_name' => 'SIROMBU',
                'origin_code' => 'DTB20106'
            ],
            [
                'origin_name' => 'SIBOLGA',
                'origin_code' => 'DTB20400'
            ],
            [
                'origin_name' => 'Padang Sidempuan',
                'origin_code' => 'DTB20500'
            ],
            [
                'origin_name' => 'TARUTUNG',
                'origin_code' => 'DTB20600'
            ],
            [
                'origin_name' => 'GUNUNG TUA',
                'origin_code' => 'DTB20700'
            ],
            [
                'origin_name' => 'DOLOK SANGGUL',
                'origin_code' => 'DTB20800'
            ],
            [
                'origin_name' => 'PANYABUNGAN',
                'origin_code' => 'DTB20900'
            ],
            [
                'origin_name' => 'SIBUHUAN',
                'origin_code' => 'DTB21000'
            ],
            [
                'origin_name' => 'SIPIROK',
                'origin_code' => 'DTB21100'
            ],
            [
                'origin_name' => 'BATANG TORU',
                'origin_code' => 'DTB21200'
            ],
        ];

        foreach ($data as $key => $value) {
            origin::create($value);
        }
    }
}
