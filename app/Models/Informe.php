<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario_id',
        'nombres',
        'nombre_area_informe',
        'estado',
        'respuesta',
        'fecha_inicio_realizadas',
        'fecha_fin_realizadas',
        'horas_total_realizadas',
        'horas_total_planificadas',
        'fecha_inicio_planificadas',
        'fecha_fin_planificadas',
    ];
}
