<?php

namespace App\Http\Controllers;

use App\Models\Realizarexamen;
use App\Models\User;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = Auth::user();

        if($usuario->roles == 'admin'){

            $usuarios = User::where('roles', '!=', 'admin')->get();

            // dd($usuarios);

            return view('admin.index', ['listado' => $usuarios]);
        }

        if($usuario->roles == 'profesor'){

            $usuarios = User::where('roles', '!=', 'profesor')->get();
            $examen = Examen::all();

            return view('profesorExamen.index', compact('examen'));
        }

        if($usuario->roles == 'alumno'){

            if($usuario->status == 'inactivo'){
                return redirect(['/'])->with('info', 'Este usuario no existe');
            }else{

                $examenes = Examen::where('curso_id', '=', $usuario->curso_id)->get();
                $examenes_realizados = $usuario->examen;


                $no_realizados = array();

                    foreach($examenes as $exam){
                        $prueba = false;

                        foreach($examenes_realizados as $exam_re){

                            if($exam_re->id == $exam->id){
                                $prueba = true;
                            }
                        }

                        if(!$prueba){
                            array_push($no_realizados, $exam);
                        }




                    }


                    $tmp = false;

                    if(empty($no_realizados)){
                        $tmp = true;
                    }
                    $fecha_actual = now();



                    return view('alumno.index', ['no_realizados' => $no_realizados, 'tmp' => $tmp, 'actual' => $fecha_actual]);



            }
        }
    }
}
