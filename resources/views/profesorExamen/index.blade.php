@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="cold-md-8">
            <div class="card">
                <div class="card-header">Lista de Examenes</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Titulo</th>
                            <th>Curso</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de fin</th>
                        </thead>
                        <tbody>
                            @foreach($examen as $examenes)
                            <tr>
                                <td>
                                    <a href="{{ url('/profesor/examenes/' . $examenes->id ) }}">
                                        {{$examenes->nombre}}
                                    </a>
                                </td>
                                <td>{{$examenes->cursos->curso}}</td>
                                <td>{{$examenes->fecha_inicio}}</td>
                                <td>{{$examenes->fecha_fin}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <td><a href="/profesor/crearexamen" class="btn btn-primary">Crear Examen</a></td>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection