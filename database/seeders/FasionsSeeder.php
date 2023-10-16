<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \DB::table('fasions')->insert([
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		        'name'=> '白Tシャツ',
		        'kakaku'=> '22000',
		        'bunrui'=> '1',
		        'color'=> '2',
                'brand'=> '1'
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		        'name'=> 'Tシャツ',
		        'kakaku'=> '35000',
		        'bunrui'=> '1',
		        'color'=> '3',
                'brand'=> '1'
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
		        'name'=> '黒デニム',
		        'kakaku'=> '50000',
		        'bunrui'=> '6',
		        'color'=> '1',
                'brand'=> '5'
            ],
        ]);
    }
}
