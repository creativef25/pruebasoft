<?php

use Illuminate\Database\Seeder;

class TwCorporativosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TwCorporativos::class, 10)->create();
    }
}
