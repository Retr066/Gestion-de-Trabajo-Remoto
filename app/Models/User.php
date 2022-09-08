<?php

namespace App\Models;
use App\Models\Area;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function getImageUserAttribute(){
        return $this->profile_photo_path ?? $this->profile_photo_url;
    }
    public function getRolAttribute(): string
    {
        if($this->role === 'admin') {
            return 'SuperUsuario';
        }else if($this->role === 'docente'){
            return 'Docente';
        }else if($this->role === 'jefatura'){
            return 'Jefe';
        }else if ($this->role === 'administracion'){
            return 'Administracion';
        }else{
            return 'No tienes Roles';
        }
    }


    public function r_area()
    {
        return $this->hasOne(Area::class,'user_id','id');
    }
    public function r_informe()
    {
        return $this->hasMany(Informe::class,'usuario_id','id');
    }

    public function scopeTermino($query,$termino)
    {
        if($termino === ''){
            return;
        }
        return $query->where('name','LIKE',"%{$termino}%")
        ->orWhere('lastname','LIKE',"%{$termino}%")
        ->orWhere('email','LIKE',"%{$termino}%")
        ->orWhereHas('r_area',function($query2) use ($termino) {
            $query2->where('nombre_area','LIKE',"%{$termino}%");
        });


    }


/*
    public function scopeRole($query ,$role){
        if ($role == '') {
        return;
        }

        return $query->whereRole($role);
    }
 */
}
