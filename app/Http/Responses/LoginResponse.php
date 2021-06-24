<?php
namespace App\Http\Responses;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        $rol = auth()->user()->getRoleNames();

        // here i am checking if the currently logout in users has a role_id of 2 which make him a regular user and then redirect to the users dashboard else the admin dashboard
        if ($rol[0] === 'SuperUsuario') {
            return redirect('informes');

        }elseif($rol[0] === 'Docente'){
            return redirect('informes');

        }elseif($rol[0] === 'Jefatura'){
            return redirect('jefatura/informes');

        }elseif($rol[0] === 'Administracion'){
            return redirect('administracion/prueba');
        }else{
            return redirect('bienvenido');
        }

    }
}
