<?php

use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('eventos')->insert([
            'nombre_evento' => 'Presentacion 10 OCT.',
            'descripcion' =>'Presentación del arte de los titeres el dia 10 de octubre del 2019',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Evento::create([
            'nombre_evento' => 'Presentacion 10 NOV.',
            'descripcion' =>'Presentacion del arte de los títeres el dia 10 de noviembre del 2019',
        ]);
    }
}
