@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h3>Crear examen</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nombre" id="floatingInput">
                        <label for="floatingInput">Nombre del examen</label>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Asignatura:</label>
                        <span class="form-control">{{$user->materias->nombre}}</span>
                        <input type="hidden" name="materia" value="{{$user->materia_id}}">
                        <input type="hidden" name="curso" value="{{$user->curso_id}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Nivel:</label>
                        <select class="form-select" name="nivel">
                            <option value="basico">Básico</option>
                            <option value="medio">Medio</option>
                            <option value="avanzado">Avanzado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Número de preguntas:</label>
                        <input class="form-control" type="number" name="num_preguntas" id="">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="">Fecha Inicio:</label>
                        <input class="form-control" type="date" name="fecha_inicio" id="">

                        <label class="form-label" for="">Fecha fin:</label>
                        <input class="form-control" type="date" name="fecha_fin" id="">
                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection