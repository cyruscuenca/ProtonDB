<?php

use Illuminate\Database\Seeder;
use App\Compatibility;

class CompatibilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compatibility::create([
            'name'        => 'Flawless',
        ]);
        Compatibility::create([
            'name'        => 'Playable',
        ]);
        Compatibility::create([
            'name'        => 'Barely playable',
        ]);
        Compatibility::create([
            'name'        => 'Not playable',
        ]);
        Compatibility::create([
            'name'        => 'Does not start',
        ]);
    }
}
