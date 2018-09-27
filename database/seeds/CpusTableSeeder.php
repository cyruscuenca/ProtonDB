<?php

use Illuminate\Database\Seeder;
use App\Cpu;

class CpusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Cpu::create([
                'name'        => 'Core i7 975',
                'brand_id'    => 1,
            ]);
            Cpu::create([
                'name'        => 'Core i7 965',
                'brand_id'    => 1,
            ]);
            Cpu::create([
                'name'        => 'Core i7 960',
                'brand_id'    => 1,
            ]);
            Cpu::create([
                'name'        => 'Core i7 950',
                'brand_id'    => 1,
            ]);
            Cpu::create([
                'name'        => 'Core i7 940',
                'brand_id'    => 1,
            ]);
            Cpu::create([
                'name'        => 'Core i7 930',
                'brand_id'    => 1,
            ]);
            Cpu::create([
                'name'        => 'Core i7 920',
                'brand_id'    => 1,
            ]);
        }
}