<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformesPlanificadas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_informe_planificadas',
        'nombre_rubro_planificadas',
        'descripcion_rubro_planificadas',
        'horas_solas_planificas'
    ];
}
