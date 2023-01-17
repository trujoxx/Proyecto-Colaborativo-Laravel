@extends('layouts.app')
@section('content')
<form action="" method="post">
    @csrf
    <div class="p-5">

            @if(session()->get('info'))

            <div class="alert alert-danger mt-2" role="alert">
                {{session()->get('info')}}
            </div>

        @endif

    <h5>Editar Examen</h5>

    <div class="p-2">
        <label class="form-label">Titulo</label>
        <input type="text" class="form-control" name="titulo" value="{{$examen->nombre}}">
    </div>

    <div class="p-2">

        <label class="form-label" for="">Nivel</label>
                        
        <select class="form-select" name="nivel">
            <option value="basico">Básico</option>
            <option value="medio">Medio</option>
            <option value="avanzado">Avanzado</option>
        </select>
    </div>

    <div class="p-2">

        <label class="form-label" for="">Curso</label>
        <input type="text" class="form-control" name="curso" value="{{$examen->cursos->curso}}" disabled>          
        
    </div>

    <div class="p-2">

        <label class="form-label" for="">Materia</label>
        <input type="text" class="form-control" name="materia" value="{{$examen->materias->nombre}}" disabled>          
        
    </div>

    <div class="p-2">
        <label class="form-label">Numero de Preguntas</label>
        <input type="number" class="form-control" name="preguntas" value="{{$examen->num_preguntas}}">
    </div>

    <div class="p-2">
        <label class="form-label">Fecha Inicio</label>
        <input type="date" class="form-control" name="inicio" value="{{$examen->fecha_inicio}}">
    </div>

    <div class="p-2">
        <label class="form-label">Fecha Fin</label>
        <input type="date" class="form-control" name="fin" value="{{$examen->fecha_fin}}">
    </div>

   

    <div class="p-2 mt-2">
        <input type="submit" class="btn btn-primary" value="Actualizar">
        <a href="/profesor/examenes" class="btn btn-danger">Atras</a>
    </div>




    </div>
</form>

@endsection