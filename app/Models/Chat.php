<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = "chats";
    protected $fillable = [
        'usuario_id','role',"usuario", "mensaje"
    ];

    public function r_user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
}
