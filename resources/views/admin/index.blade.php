@extends('layouts.app')


@section('content')

<div class="p-5">
        <h5>Listado Usuarios</h5>
        <hr>

        <a href="{{route('form_crear')}}" class="btn btn-primary mb-2">Crear Profesor</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Activo</th>
                        <th>Curso</th>
                        <th>Materias</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($listado as $list)

                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->email}}</td>
                            <td>
                                @if($list->roles == 'profesor')

                                    <p class="badge bg-warning">Profesor</p>

                                @else

                                    <p class="badge bg-primary">Alumno</p>

                                @endif
                            </td>

                            <td>
                                @if($list->status == 'activo')

                                    <p class="badge bg-success">activo</p>

                                @else

                                    <p class="badge bg-danger">inactivo</p>

                                @endif
                            </td>

                            <td>
                                {{$list->cursos->curso}}
                            </td>

                            <td>{{$list->materias->nombre}}</td>

                            <td>
                                <a href="{{route('editar_usuario', $list->id)}}" class="btn btn-primary">Editar</a>

                                @if($list->status == 'activo')

                                    <a href="{{route('cambiar_status', $list->id)}}" class="btn btn-danger">Desactivar</a>

                                @else

                                    <a href="{{route('cambiar_status', $list->id)}}" class="btn btn-success">Activar</a>

                                @endif

                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

    </div>

@endsection
