<?php

use Illuminate\Database\Seeder;
use App\Gpu;

class GpusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gpu::create([
            'name'        => 'GeForce 256 SDR',
            'brand_id'    => 3,
        ]);
        Gpu::create([
            'name'        => 'GeForce 256 DDR',
            'brand_id'    => 3,
        ]);
        Gpu::create([
            'name'        => 'GeForce2 MX200',
            'brand_id'    => 3,
        ]);
        Gpu::create([
            'name'        => 'GeForce2 MX',
            'brand_id'    => 3,
        ]);
        Gpu::create([
            'name'        => 'GeForce2 MX400',
            'brand_id'    => 3,
        ]);
        Gpu::create([
            'name'        => 'GeForce2 GTS',
            'brand_id'    => 3,
        ]);
        Gpu::create([
            'name'        => 'GeForce2 Pro',
            'brand_id'    => 3,
        ]);
    }
}
