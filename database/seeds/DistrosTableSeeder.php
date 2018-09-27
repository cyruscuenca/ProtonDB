<?php

use Illuminate\Database\Seeder;
use App\Distro;

class DistrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Distro::create([
            'name'        => 'Ubuntu',
        ]);
        Distro::create([
            'name'        => 'Linux Mint',
        ]);
        Distro::create([
            'name'        => 'Arch',
        ]);
        Distro::create([
            'name'        => 'elementaryOS',
        ]);
    }
}
