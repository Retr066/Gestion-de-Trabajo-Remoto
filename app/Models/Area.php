<?php

namespace App\Models;
use  App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Informe;
class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nombre_area',

    ];
    /**
     * Get the

     *
     *
     */
    public function r_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function r_area()
    {
        return $this->belongsTo(Informe::class, 'user_id', 'usuario_id');
    }
}
