@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h3>Crear preguntas</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf

                    @for($i = 0; $i < $numPreguntas; $i++) 
                    <div class="form-group">
                        <label for="">Pregunta</label>
                        <input type="text" class="form-control" name="pregunta{{$i}}" id="">
                    </div>
                    <br>
            <div class="form-group">
                <label for="">Respuestas</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="1" name="correcta{{$i}}"><input class="form-check-label" type="text" name="respuesta{{$i}}a">
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="2" name="correcta{{$i}}"><input class="form-check-label" type="text" name="respuesta{{$i}}b">
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="3" name="correcta{{$i}}"><input class="form-check-label" type="text" name="respuesta{{$i}}c">
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="4" name="correcta{{$i}}"><input class="form-check-label" type="text" name="respuesta{{$i}}d">
                </div>
            </div>
            <br>
            @endfor

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>



@endsection