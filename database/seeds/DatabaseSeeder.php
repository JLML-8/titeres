<?php

use App\Voluntarios;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(App\Voluntarios::class);
        factory(App\Voluntarios::class, 100)->create();
    }
}
