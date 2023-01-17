<?php

namespace Database\Seeders;

use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaSeeder extends Seeder
{
    private $arrayMaterias = array(
        array(
            'nombre' => 'admin',
        ),
        array(
            'nombre' => 'alumno',
        ),
        array(
            'nombre' => 'Biologia y Geologia',
        ),
        array(
            'nombre' => 'Matematicas',
        ),
        array(
            'nombre' => 'Musica',
        ),
        array(
            'nombre' => 'Geologia',
        ),
        array(
            'nombre' => 'Fisica y Quimica',
        ),
        array(
            'nombre' => 'Filosofia',
        ),
        array(
            'nombre' => 'Historia del España',
        ),


    );

    public function run()
    {
        self::loadMaterias();
    }

    private function loadMaterias(){
        DB::table('materias')->delete();

        foreach($this->arrayMaterias as $mat){
            $m = new Materia();

            $m->nombre = $mat['nombre'];
            $m->save();
        }


    }
}
