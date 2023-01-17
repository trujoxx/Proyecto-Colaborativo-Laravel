<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    private $arrayCursos = array(
        array(
            'curso' => 'admin'
        ),
        array(
            'curso' => '1º ESO'
        ),
        array(
            'curso' => '2º ESO'
        ),
        array(
            'curso' => '3º ESO'
        ),
        array(
            'curso' => '4º ESO'
        ),
        array(
            'curso' => '1º Bach'
        ),
        array(
            'curso' => '2º Bach'
        ),

    );

    public function run()
    {
        self::loadCursos();
    }

    private function loadCursos(){
        DB::table('cursos')->delete();

        foreach($this->arrayCursos as $curso){
            $c = new Curso();

            $c->curso = $curso['curso'];
            $c->save();
        }


    }




}
