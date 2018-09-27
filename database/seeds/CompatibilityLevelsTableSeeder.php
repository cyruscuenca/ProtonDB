<?php

use Illuminate\Database\Seeder;
use App\CompatibilityLevel;

class CompatibilityLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompatibilityLevel::create([
            'name'        => 'Flawless',
        ]);
        CompatibilityLevel::create([
            'name'        => 'Playable',
        ]);
        CompatibilityLevel::create([
            'name'        => 'Barely playable',
        ]);
        CompatibilityLevel::create([
            'name'        => 'Not playable',
        ]);
        CompatibilityLevel::create([
            'name'        => 'Does not start',
        ]);
    }
}
