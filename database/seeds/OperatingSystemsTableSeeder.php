<?php

use Illuminate\Database\Seeder;
use App\OperatingSystem;

class OperatingSystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OperatingSystem::create([
            'distro_id'        => '1',
            'version'        => '18.04',
        ]);
        OperatingSystem::create([
            'distro_id'        => '1',
            'version'        => '17.10',
        ]);
    }
}
