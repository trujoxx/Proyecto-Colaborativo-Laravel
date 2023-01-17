@extends('layouts.app')

@section('content')

    <div class="p-5">

        @if(session()->get('info'))

            <div class="alert alert-danger mt-2" role="alert">
                {{session()->get('info')}}
            </div>

        @endif

        <form action="" method="post">

            @csrf

            @method('PUT')

            <h5>Editar Usuario</h5>
            <hr>

            <div class="p-2">

                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">

                @error('name')

                <div class="alert alert-danger mt-2" role="alert">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="p-2">

                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{$user->email}}">

                @error('email')

                <div class="alert alert-danger mt-2" role="alert">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="p-2">

                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" value="{{$user->password}}">

                @error('password')

                <div class="alert alert-danger mt-2" role="alert">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="p-2">

                <label class="form-label">Curso</label>
                <select name="curso" class="form-select">
                    @foreach($cursos as $c)
                        <option value="{{$c->id}}" @if($user->curso_id == $c->id) selected = 'selected' @endif>{{$c->curso}}</option>
                    @endforeach
                </select>

                @error('curso')

                <div class="alert alert-danger mt-2" role="alert">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="p-2">

                <label class="form-label">Materia</label>
                <select name="materia" class="form-select">
                    @foreach($materias as $m)
                        <option value="{{$m->id}}" @if($user->materia_id === $m->id) selected = 'selected' @endif>{{$m->nombre}}</option>
                    @endforeach
                </select>

                @error('materia')

                <div class="alert alert-danger mt-2" role="alert">
                    {{$message}}
                </div>

                @enderror
            </div>

            <div class="p-2 mt-2">
                <input type="submit" class="btn btn-primary" value="Añadir">
                <a href="{{route('home')}}" class="btn btn-danger">Volver</a>
            </div>



        </form>

    </div>

@endsection
