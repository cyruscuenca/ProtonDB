<?php

use Illuminate\Database\Seeder;
use App\Driver;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'name'        => '285.03',
            'brand_id'    => 3,
        ]);
        Driver::create([
            'name'        => '325.15',
            'brand_id'    => 3,
        ]);
        Driver::create([
            'name'        => '331.13',
            'brand_id'    => 3,
        ]);
        Driver::create([
            'name'        => '319.60',
            'brand_id'    => 3,
        ]);
        Driver::create([
            'name'        => '173.14.38',
            'brand_id'    => 3,
        ]);
        Driver::create([
            'name'        => '319.49',
            'brand_id'    => 3,
        ]);
        Driver::create([
            'name'        => '304.108',
            'brand_id'    => 3,
        ]);
    }
}
