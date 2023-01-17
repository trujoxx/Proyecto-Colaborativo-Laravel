@extends('layouts.app')

@section('content')

    <div class="p-5">


        <form action="{{route('corregir_examen', $examen->id)}}" method="post">

            @csrf

            <h3>Examen: {{$examen->nombre}}</h3>

            <p>Descripcion: Debes Responder todas las preguntas</p>
            <hr>

            @foreach($examen->preguntas as $key => $pre)

                <div class="mb-3">
                    <label class="form-label">{{$pre->pregunta}}</label>
                    <ul class="list-group">

                    @foreach($pre->respuestas as $num => $resp)

                        <li style="list-style:none;" class="mb-1">
                            <input type="radio" name="resp{{$key}}" class="form-check-input" value="{{$resp->respuesta}}"> {{$resp->respuesta}}
                        </li>

                    @endforeach
                    </ul>
                </div>

            @endforeach

            <div>
                <button class="btn btn-success" type="submit">Corregir</button>
                <a href="{{route('home')}}" class="btn btn-danger">Volver</a>
            </div>



        </form>


    </div>


@endsection
