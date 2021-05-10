<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario_id',
        'estado',
        'respuesta',
        'fecha_inicio_realizadas',
        'fecha_fin_realizadas',
        'horas_total_realizadas',
        'horas_total_planificadas',
        'fecha_inicio_planificadas',
        'fecha_fin_planificadas',
    ];


    public function r_user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
    public function r_informe_realizadas()
    {
        return $this->hasMany(InformesRealizadas::class,'id_informe_realizadas','id');
    }
    public function r_informe_planificadas()
    {
        return $this->hasMany(InformesPlanificadas::class,'id_informe_planificadas','id');
    }


}
