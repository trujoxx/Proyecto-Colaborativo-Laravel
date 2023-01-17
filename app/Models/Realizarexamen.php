<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realizarexamen extends Model
{
    use HasFactory;

    protected $primaryKey = ['examen_id', 'user_id'];


}
