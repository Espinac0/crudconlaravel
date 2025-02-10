<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;

    protected $table = 'alumnos';
    protected $primaryKey = 'id';
    protected $timestamp = true;

    protected $fillable = [
        'nombre',
        'email',
        'edad',
    ];
}
