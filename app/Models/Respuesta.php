<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'respuesta',
        'preguntas_id',
    ];

    public function preguntas(){
        return $this->belongsTo(Pregunta::class, 'preguntas_id');
    }


}
