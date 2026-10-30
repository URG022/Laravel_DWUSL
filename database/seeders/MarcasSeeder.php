<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'nombre' => 'Nike',
                'created_at' => Carbon::now()
            ],
            [
                'nombre' => 'PUMA',
                'created_at' => Carbon::now()
            ],
            [
                'nombre' => 'ADIDAS',
                'created_at' => Carbon::now()
            ],
        );

        DB::table('marcas')->insert($data);
    }
}
