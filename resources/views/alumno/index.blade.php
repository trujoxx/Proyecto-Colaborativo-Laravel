@extends('layouts.app')


@section('content')


    <div class="p-5">

        <div>
            <a href="" class="btn btn-success">Examenes a Realizar</a>
            <a href="{{route('examenes_realizados')}}" class="btn btn-info">Mis Pruebas</a>
        </div>

        <hr>

            @if($tmp)

                <h2 class="alert">No tienes ningun examen pendiente</h2>

            @else

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tema</th>
                            <th>Asignatura</th>
                            <th>Fechas inicio</th>
                            <th>Fecha Fin</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($no_realizados as $exam)

                            <tr>
                                <td>{{$exam->id}}</td>
                                <td>{{$exam->titulo}}</td>
                                <td>{{$exam->materias->nombre}}</td>
                                <td>{{$exam->fecha_inicio}}</td>
                                <td>{{$exam->fecha_fin}}</td>
                                <td>
                                    @if($exam->fecha_fin > $actual)
                                    <a href="{{route('realizar_examen', $exam->id)}}" class="btn btn-success">Realizar Examen</a>
                                    @else
                                    <a href="" class="btn btn-danger">Examen fuera de plazo</a>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>


            @endif


    </div>



@endsection
