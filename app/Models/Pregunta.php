<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregunta',
        'respuesta_correcta',
        'examen_id',
    ];

    public function examen(){
        return $this->belongsTo(Examen::class, 'examen_id');
    }

    public function respuestas(){
        return $this->hasMany(Respuesta::class, 'preguntas_id');
    }


}
