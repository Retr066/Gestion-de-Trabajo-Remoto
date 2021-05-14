<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario_id',
        'estado',
        'respuesta',
        'horas_total_realizadas',
        'horas_total_planificadas',
        'fecha_inicio_realizadas',
        'fecha_fin_realizadas',
        'fecha_inicio_planificadas' ,
        'fecha_fin_planificadas' ,
    ];


    /* protected $dates = [
        'fecha_inicio_realizadas' => 'datetime:Y-m-d',
        'fecha_fin_realizadas' => 'datetime:Y-m-d',
        'fecha_inicio_planificadas' => 'datetime:Y-m-d',
        'fecha_fin_planificadas' => 'datetime:Y-m-d',
    ]; */

    public function r_user()
    {
        return $this->hasMany(User::class, 'usuario_id', 'id');
    }
    public function r_informe_realizadas()
    {
        return $this->hasMany(InformesRealizadas::class,'id_informe_realizadas','id');
    }
    public function r_informe_planificadas()
    {
        return $this->hasMany(InformesPlanificadas::class,'id_informe_planificadas','id');
    }


    public function scopeTermino($query,$termino)
    {

        $id_user = Auth::user()->id;
        if($termino === ''){
            return;
        }
        return $query->where('id','LIKE',"%{$termino}%")
        ->orWhere(['usuario_id'=>500])
        ->orWhere('created_at','LIKE',"%{$termino}%")
        ->orwhere('estado','LIKE',"%{$termino}%")
        ->orwhere('fecha_inicio_realizadas','LIKE',"%{$termino}%")
        ->orwhere('fecha_fin_realizadas','LIKE',"%{$termino}%")
        ->orwhere('horas_total_realizadas','LIKE',"%{$termino}%");


    }


}
