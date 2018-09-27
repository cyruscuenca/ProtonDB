<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name'        => 'Intel',
        ]);
        Brand::create([
            'name'        => 'AMD',
        ]);
        Brand::create([
            'name'        => 'NVIDIA',
        ]);
        Brand::create([
            'name'        => 'ATI',
        ]);
        Brand::create([
            'name'        => 'ARM',
        ]);
        Brand::create([
            'name'        => 'Qualcomm',
        ]);
    }
}
