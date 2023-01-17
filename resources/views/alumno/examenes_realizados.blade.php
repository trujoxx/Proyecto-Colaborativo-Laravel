@extends('layouts.app')

@section('content')


    <div class="p-5">

        <div>
            <a href="{{route('home')}}" class="btn btn-info">Examenes a Realizar</a>
            <a href="" class="btn btn-success">Mis Pruebas</a>
        </div>

        <hr>

            @if($examenes->isEmpty())

                <h2 class="alert">No hay ningun examen</h2>

            @else

                <table class="table">
                    <thead>
                        <tr>
                            <th>Tema</th>
                            <th>Asignatura</th>
                            <th>Fechas Realizada</th>
                            <th>Nota</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($examenes as $exam)

                            <tr>
                                <td>{{$exam->nombre}}</td>
                                <td>{{$exam->materias->nombre}}</td>
                                <td>{{$exam->pivot->fecha_realizada}}</td>
                                <td>{{$exam->pivot->nota}}</td>
                                <td><a href="{{route('ver_examen', $exam->id) }}" class="btn btn-info">Revisar Examen</a></td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>


            @endif


    </div>


@endsection
