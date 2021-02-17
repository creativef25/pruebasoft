<?php

use Illuminate\Database\Seeder;

class TwUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TwUsuarios::class, 10)->create();
    }
}
