<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso'
    ];

    public function users(){
        return $this->hasMany(User::class, 'curso_id');
    }

    public function examens(){
        return $this->hasMany(Examen::class, 'curso_id');
    }
}
