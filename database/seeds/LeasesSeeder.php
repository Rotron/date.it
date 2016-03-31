<?php

use Illuminate\Database\Seeder;

class LeasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Lease::class, 15)->create();
    }
}
