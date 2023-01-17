<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditarRequest;
use App\Http\Requests\ProfesorRequest;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    public function vistaFormulario()
    {

        $cursos = Curso::where('curso', '!=', 'admin')->get();

        $materias = Materia::where('nombre', '!=', 'admin')->where('nombre', '!=', 'alumno')->get();

        return view('admin.crear', ['cursos' => $cursos, 'materias' => $materias]);
    }


    public function crearProfesor( ProfesorRequest $request )
    {
        $usuarios = User::all();
        $tmp = false;


            foreach($usuarios as $usu){
                if($request->input('email') === $usu->email){
                    $tmp = true;

                }
            }

            if($tmp){

                return redirect()->route('form_crear')->with('info', 'Este email ya existe');
            }else{

                $profesor = new User();

                $profesor->name = $request->input('name');
                $profesor->email = $request->input('email');
                $profesor->password = bcrypt($request->input('password'));
                $profesor->roles = 'profesor';
                $profesor->curso_id = $request->input('curso');
                $profesor->materia_id = $request->input('materia');

                $profesor->save();

                return redirect()->route('home');
            }


    }

    public function editFormulario($id){

        $usuario = User::where('id', '=', $id)->get();


        $cursos = Curso::where('curso', '!=', 'admin')->get();

        $materias = Materia::where('nombre', '!=', 'admin')->get();

        return view('admin.editar', ['cursos' => $cursos, 'materias' => $materias, 'user' => $usuario[0]]);

    }


    public function editarUsuario(EditarRequest $request, $id){

        $usu = User::where('id', '=', $id)->get();
        $usuarios = User::all();


        $usu[0]->name = $request->input('name');


        if($usu[0]->email != $request->input('email')){
            $tmp = false;

            foreach($usuarios as $u){
                if($request->input('email') === $u->email){
                    $tmp = true;

                }
            }


            if($tmp){
                return redirect()->route('form_editar')->with('info', 'Este email ya existe');
            }else{
                $usu[0]->email = $request->input('email');
            }
        }



        if(Hash::check($request->input('password'), $usu[0]->password)){
            $usu[0]->password = $request->input('password');
        }

        $usu[0]->curso_id = $request->input('curso');
        $usu[0]->materia_id = $request->input('materia');

        $usu[0]->save();


        return redirect()->route('home');


    }



    public function statusUsuario($id){

        $user = User::where('id', '=', $id)->get();

        if($user[0]->status == 'activo'){
            $user[0]->status = 'inactivo';
        }else{
            $user[0]->status = 'activo';
        }

        $user[0]->save();

        return redirect()->route('home');

    }
}
