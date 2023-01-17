@extends('layouts.app')


@section('content')


    <div class="p-5">

        <h3>Examen: {{$examen->nombre}}</h3>
        <h5>Nota: {{$usuario->pivot->nota}} / 10</h5>
        <br>
        <h5>Respuestas al examen</h5>
        <hr>

        @foreach($examen->preguntas as $preguntas)

            <label class="form-label">{{$preguntas->pregunta}}</label>
            <ul class="list-group">
                @foreach($preguntas->respuestas as $resp)

                <li style="list-style:none;"
                 @foreach($respuestas as $resp_usu)

                    @if($resp_usu->id == $resp->id)
                        @if($resp_usu->respuesta == $preguntas->respuesta_correcta)
                            class='bg-success'
                        @else
                            class='bg-danger'
                        @endif
                    @endif

                 @endforeach

                 >
                    <input
                    type="radio"
                    class="form-check-input"
                    disabled
                    @if($resp->respuesta == $preguntas->respuesta_correcta) checked @endif
                    > {{$resp->respuesta}}

                </li>

                @endforeach
            </ul>

        @endforeach

        <div class="mt-3">
            <a href="{{route('examenes_realizados')}}" class="btn btn-danger">Volver</a>
        </div>
    </div>


@endsection
