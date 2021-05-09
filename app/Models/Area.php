<?php

namespace App\Models;
use  App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
