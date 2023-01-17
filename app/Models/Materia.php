<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];


    public function users(){
        return $this->belongsTo(User::class, 'materias_id');
    }

    public function examen(){
        return $this->hasMany(Examen::class, 'materia_id');
    }
}
