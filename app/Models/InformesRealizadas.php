<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformesRealizadas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_informe_realizadas',
        'nombre_rubro_realizadas',
        'descripcion_rubro_realizadas',
        'horas_solas_realizadas'
    ];
}
