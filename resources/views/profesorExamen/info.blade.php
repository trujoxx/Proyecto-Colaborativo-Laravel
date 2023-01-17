@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="cold-md-8">
            <div class="card">
                <div class="card-header">Información del examen</div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <table class="table">
                            <thead>
                                <th>Nombre</th>
                                <th>Nivel</th>
                                <th>Numero de Preguntas</th>
                                <th>Materia</th>
                                <th>Curso</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$examen->nombre}}</td>
                                    <td>{{$examen->nivel}}</td>
                                    <td>{{$examen->num_preguntas}}</td>
                                    <td>{{$examen->materias->nombre}}</td>
                                    <td>{{$examen->cursos->curso}}</td>
                                    <td>{{$examen->fecha_inicio}}</td>
                                    <td>{{$examen->fecha_fin}}</td>
                                    <td><button class="btn btn-primary">Editar</button></td>
                                    <td><a href="/profesor/examenes" class="btn btn-danger">Atras</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection