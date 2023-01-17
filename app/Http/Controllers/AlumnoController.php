<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamenRequest;
use App\Models\Examen;
use App\Models\Realizarexamen;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{


    public function realizados()
    {
        $usuario = Auth::user();

        $examenes_realizados = $usuario->examen;



        return view('alumno.examenes_realizados', ['examenes' => $examenes_realizados]);



    }


    public function examenRealizar($id){

        $examen = Examen::findOrFail($id);

        // dd($examen->preguntas);


        return view('alumno.realizar_examen', ['examen' => $examen]);

    }

    public function corregirExamen($id, Request $request){

        $examen = Examen::findOrFail($id);
        $usuario = Auth::user();

        for($i = 0; $i < $examen->num_preguntas; $i++){

            $request->validate([
                'resp'.$i => 'required',
            ]);


        }

        // dd($request);

        $num_preguntas = $examen->num_preguntas;
        $correctas = 0;

        foreach($examen->preguntas as $key => $preg){

            if($preg->respuesta_correcta == $request->input('resp'.$key)){
                $correctas++;
            }
        }

        for($i = 0; $i < $num_preguntas; $i++){
            $respuesta = Respuesta::where('respuesta', '=', $request->input('resp'.$i))->get();
            $usuario->respuestas()->attach($respuesta[0]->id, ['examen' => $examen->id]);
        }


        $nota = ($correctas * 10) / $num_preguntas;

        $fecha_realizada = now();

        $examen->users()->attach($usuario->id, ['fecha_realizada' => $fecha_realizada, 'nota' => $nota]);


        return redirect()->route('home');
    }


    public function verExamen($id){

        $examen = Examen::findOrFail($id);
        $usuario = Auth::user();

        $usuario_examen = $examen->users->find($usuario->id);

        $respuestas_usuario = array();

        foreach($usuario->respuestas as $resp){

            if($resp->pivot->examen == $examen->id){
                array_push($respuestas_usuario, $resp);
            }
        }

        // dd($respuestas_usuario);

        return view('alumno.ver_examen', ['examen' => $examen, 'usuario' => $usuario_examen, 'respuestas' => $respuestas_usuario]);
    }
}
