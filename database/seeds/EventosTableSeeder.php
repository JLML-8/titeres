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
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('eventos')->insert([
            'nombre_evento' => 'Presentación para caridad 23 de diciembre.',
            'descripcion' =>'Obra de caridad en casa de la cultura',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('eventos')->insert([
            'nombre_evento' => 'Presentación 28 de diciembre.',
            'descripcion' =>'Presentación en la casa de la cultura por motivos lucrativos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('eventos')->insert([
            'nombre_evento' => 'Presentación de la obra "el principito" 29 de enero de 2020',
            'descripcion' =>'Presentación de la obra el principito el día 29 de enero de 2020',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('eventos')->insert([
            'nombre_evento' => 'Presentación 2 de febrero de 2020 "La vida es un sueño".',
            'descripcion' =>'La vida es sueño es una obra de teatro de Pedro Calderón de la Barca estrenada en 1635 y perteneciente al movimiento literario del barroco.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('eventos')->insert([
            'nombre_evento' => 'Presentacion 10 de mayo de 2020 "La casa de Bernarda Alba"',
            'descripcion' =>'La casa de Bernarda Alba es una obra teatral en tres actos escrita en 1936 por Federico García Lorca.​ No pudo ser estrenada ni publicada hasta 1945, en Buenos Aires y gracias a la iniciativa de Margarita Xirgu.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('eventos')->insert([
            'nombre_evento' => 'Presentacion 15 OCT.',
            'descripcion' =>'Presentación del arte de los titeres el dia 10 de octubre del 2019',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('eventos')->insert([
            'nombre_evento' => 'Presentacion 19 OCT.',
            'descripcion' =>'Presentación del arte de los titeres el dia 10 de octubre del 2019',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        factory(App\Evento::class, 100)->create();
    }
}
