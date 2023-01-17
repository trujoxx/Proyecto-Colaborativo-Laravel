<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
protected $fillable = [
    'nombre',
    'nivel',
    'num_preguntas',
    'materia_id',
    'curso_id',
    'fecha_fin',
    'fecha_inicio'
];

    public function users(){
        return $this->belongsToMany(User::class, 'realizarexamens')->withPivot('fecha_realizada', 'nota')->withTimestamps();
    }

    public function materias(){
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    public function preguntas(){
        return $this->hasMany(Pregunta::class, 'examen_id');
    }

    public function cursos(){
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
