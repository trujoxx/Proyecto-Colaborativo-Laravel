<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Respuesta;
use App\Models\Pregunta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfesorExamenController extends Controller
{

    public function create2()
    {
        $usuario = Auth::user();

        return view('profesorExamen.create2', ['user' => $usuario]);
    }

    public function crearexamen(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'nivel' => 'required',
            'num_preguntas' => 'required',
            'fecha_fin' => 'required',
            'fecha_inicio' => 'required'
        ]);

        $examen = new Examen([
            'nombre' => $request->get('nombre'),
            'nivel' => $request->get('nivel'),
            'materia_id' => $request->get('materia'),
            'curso_id' => $request->get('curso'),
            'num_preguntas' => $request->get('num_preguntas'),
            'fecha_inicio' => $request->get('fecha_inicio'),
            'fecha_fin' => $request->get('fecha_fin')
        ]);

        $examen->save();

        return redirect(route('preguntas', ['examenId' => $examen->id]));
    }

    public function edit($id)
    {
        $examen = Examen::find($id);

        return redirect(route('actualizar',['id' => $examen->id]));
    }

    public function edit2($id)
    {
        $examen = Examen::find($id);

        return view('profesorExamen.edit', compact('examen'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'titulo' => 'required',
            'nivel' => 'required',
            'preguntas' => 'required',
            'inicio' => 'required',
            'fin' => 'required'
        ]);

        $usuario = Auth::user();

        $examen = Examen::find($id);

        $examen->nombre =  $request->get('titulo');
        $examen->nivel = $request->get('nivel');
        $examen->num_preguntas = $request->get('preguntas');
        $examen->fecha_inicio = $request->get('inicio');
        $examen->fecha_fin = $request->get('fin');
        $examen->save();

        return view('profesorExamen.edit', compact('examen'))->with('success', 'Examen actualizado.');
    }

    public function borrarExamen($id)
    {
        $examen = Examen::find($id);
        $examen->delete();

        return redirect('/profesor/examenes')->with('success', 'Examen eliminado correctamente.');
    }

    public function verExamenes()
    {

        $examen = Examen::all();

        return view('profesorExamen.index', compact('examen'));
    }

    public function examen($id)
    {

        $examen = Examen::find($id);

        return view('profesorExamen.info', compact('examen'));
    }


    public function crearPreguntas($examenId)
    {

        $examen = Examen::where('id', $examenId)->get('num_preguntas');

        $numPreguntas = $examen[0]->num_preguntas;


        return view('profesorExamen.create', ['numPreguntas' => $numPreguntas, 'examenId' => $examenId]);
    }

    public function preguntasSave(Request $request, $examenId)
    {

        $examen1 = Examen::where('id', $examenId)->get('num_preguntas');

        $numPreguntas = $examen1[0]->num_preguntas;

        for ($i = 0; $i < $numPreguntas; $i++) {


            $correcta = $request->get('correcta');

            if($correcta==1){
                $respuestaCorrecta = $request->get('respuesta'.$i.'a');
            }else if($correcta==2){
                $respuestaCorrecta = $request->get('respuesta'.$i.'b');
            }else if($correcta==3){
                $respuestaCorrecta= $request->get('respuesta'.$i.'c');
            }else{
                $respuestaCorrecta= $request->get('respuesta'.$i.'d');

            }

            $pregunta = new Pregunta([
                'pregunta' => $request->get('pregunta'.$i),
                'examen_id' => $examenId,
                'respuesta_correcta' => $respuestaCorrecta
            ]);

            $pregunta->save();
                
            $respuesta1 = new Respuesta([
                'respuesta' => $request->get('respuesta'.$i.'a'),
                'preguntas_id' => $pregunta->id
            ]);

            $respuesta2 = new Respuesta([
                'respuesta' => $request->get('respuesta'.$i.'b'),
                'preguntas_id' => $pregunta->id
            ]);

            $respuesta3 = new Respuesta([
                'respuesta' => $request->get('respuesta'.$i.'c'),
                'preguntas_id' => $pregunta->id
            ]);

            $respuesta4 = new Respuesta([
                'respuesta' => $request->get('respuesta'.$i.'d'),
                'preguntas_id' => $pregunta->id
            ]);
            
            $respuesta1->save();
            $respuesta2->save();
            $respuesta3->save();
            $respuesta4->save();
        
        }

        $examen = Examen::all();

        return view('profesorExamen.index', compact('examen'));
    }

}
