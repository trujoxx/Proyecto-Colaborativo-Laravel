<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
        'curso_id',
        'materia_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function materias(){
        return $this->belongsTo(Materia::class, 'id');
    }

    public function examen(){
        return $this->belongsToMany(Examen::class, 'realizarexamens')->withPivot('fecha_realizada', 'nota')->withTimestamps();
    }

    public function cursos(){
        return $this->belongsTo(Curso::class, 'id');
    }

    public function respuestas(){
        return $this->belongsToMany(Respuesta::class, 'respuestas_usuarios')->withPivot('examen')->withTimestamps();
    }
}
