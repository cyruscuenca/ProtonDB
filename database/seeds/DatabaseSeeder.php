<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'jobs',
            'sessions',
        ]);

        $this->call(AuthTableSeeder::class);
        $this->call(CompatibilityLevelsTableSeeder::class);
        $this->call(DistrosTableSeeder::class);
        $this->call(DriversTableSeeder::class);
        $this->call(CpusTableSeeder::class);
        $this->call(GpusTableSeeder::class);

        Model::reguard();
    }
}
