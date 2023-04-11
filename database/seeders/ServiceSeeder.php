<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder de servicios, son datos precargados para la tabla servicios 
        DB::table('services')->insert([
            [
                'nombre' => 'Vacuna general',
                'precio' => 130,
                'imagen' => 'Vacuna general.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Vacuna contra la rabia',
                'precio' => 70,
                'imagen' => 'Vacuna contra la rabia.png',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Baño',
                'precio' => 200,
                'imagen' => 'Baño.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Castracion de gat@',
                'precio' => 670,
                'imagen' => 'Castracion de gat@.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Castracion de perr@',
                'precio' => 900,
                'imagen' => 'Castracion de perr@.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Corte de pelo',
                'precio' => 190,
                'imagen' => 'Corte de pelo.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Desparacitacion de loros',
                'precio' => 110,
                'imagen' => 'Desparacitacion de loros.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Eliminacion de pulgas',
                'precio' => 300,
                'imagen' => 'Eliminacion de pulgas.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Operacion de ojos',
                'precio' => 2900,
                'imagen' => 'Operacion de ojos.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Operacion general',
                'precio' => 0,
                'imagen' => 'Operacion general.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Uñas',
                'precio' => 220,
                'imagen' => 'Uñas.jpg',
                'created_at'=> date('Y-m-d H:m:s'),
            ],
            
        ]);
    }
}
