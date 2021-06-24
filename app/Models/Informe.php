<?php

namespace App\Models;
use App\Models\Area;
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




    public function r_user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function r_area()
    {
        return $this->belongsTo(Area::class,'usuario_id','user_id');
    }

    public function r_informe_realizadas()
    {
        return $this->hasMany(InformesRealizadas::class,'id_informe_realizadas','id');
    }
    public function r_informe_planificadas()
    {
        return $this->hasMany(InformesPlanificadas::class,'id_informe_planificadas','id');
    }

    public function getEstadoCambiadoAttribute(): string
    {
        if($this->estado === 'generado') {
            return 'Generado';
        }else if($this->estado === 'enviado_jefatura'){
            return 'Enviado';
        }else if($this->estado === 'rechazado_jefatura'){
            return 'Desaprobado';
        }else if ($this->estado === 'enviado_recursos'){
            return 'Aprobado';
        }else{
            return 'No tienes Estado';
        }
    }



    public function scopeTermino($query,$termino)
    {


        if($termino === ''){
            return;
        }
        return $query->where('id','LIKE',"%{$termino}%")
        ->orWhere('updated_at','LIKE',"%{$termino}%")
        ->orwhere('estado','LIKE',"%{$termino}%")
        ->orWhereHas('r_user',function($query2) use ($termino){
            $query2->where('name','LIKE',"%.{$termino}.%")
            ->orWhere('lastname','LIKE',"%.{$termino}.%")
            ->orWhere('email','LIKE',"%.{$termino}.%");
        });


    }


    public function scopeEstados($query ,$estado){
        if ($estado == '') {
        return;
        }

        return $query->where('estado',$estado);
    }



}
