<?php

namespace App\Http\Livewire;
use  App\Models\Chat;
use Livewire\Component;
use Auth;
use Spatie\Permission\Models\Role;
class ChatList extends Component
{
    public $usuario;
    public $mensajes;
    protected $ultimoId;
    public $usuario_id;
    public $rol_name;
    protected $listeners = ['mensajeRecibido', 'cambioUsuario'];

    public function mount()
    {
       /*  $data  =  $rol_user = auth()->user()->getRoleNames();
        $this->rol_name = $data[0]; */
        $this->usuario_id = Auth::user()->id;
        $ultimoId = 0;
        $this->mensajes = $this->traerUltimosDatos();
        $this->usuario = request()->query('usuario', $this->usuario) ?? "";
    }

    public function  mensajeRecibido($data)
    {
        $this->actualizarMensajes($data);
    }

    public function cambioUsuario($usuario)
    {
        $this->usuario = $usuario;
    }






    public function traerUltimosDatos()
    {

        $mensajes = Chat::orderBy("created_at", "desc")->take(15)->get();

        $datos = array();

            foreach($mensajes as $mensaje)
            {

                    $item = [
                        "id" => $mensaje->id,
                        "usuario" => $mensaje->usuario,
                        'rol' => $mensaje->role,
                        "mensaje" => $mensaje->mensaje,
                        'profile_photo_path' => $mensaje->r_user->profile_photo_path,
                        'profile_photo_url' => $mensaje->r_user->profile_photo_url,
                        "recibido" => ($mensaje->usuario_id != $this->usuario_id),
                        "fecha" => $mensaje->created_at->diffForHumans()
                    ];

                    array_unshift($datos, $item);
                    //array_push($this->mensajes, $item);



            }

            $datos = array_reverse($datos);

            return $datos;
    }

    public function actualizarMensajes($data)
    {

        if($this->usuario != "")
        {
            // El contenido de la Push
            //$data = \json_decode(\json_encode($data));

            $mensajes = Chat::orderBy("created_at", "desc")->get();
            //$this->mensajes = [];

            foreach($mensajes as $mensaje)
            {
                if($this->ultimoId < $mensaje->id)
                {
                    $this->ultimoId = $mensaje->id;

                    $item = [
                        "id" => $mensaje->id,
                        "usuario" => $mensaje->usuario,
                        'rol' => $mensaje->role,
                        "mensaje" => $mensaje->mensaje,
                        'profile_photo_path' => $mensaje->r_user->profile_photo_path,
                        'profile_photo_url' => $mensaje->r_user->profile_photo_url,
                        "recibido" => ($mensaje->usuario_id != $this->usuario_id),
                        "fecha" => $mensaje->created_at->diffForHumans()
                    ];


                    array_unshift($this->mensajes, $item);
                    //array_push($this->mensajes, $item);
                }

            }

            if(count($this->mensajes) > 100)
            {
                array_pop($this->mensajes);
            }
        }
        else
        {
            $this->emit('solicitaUsuario');
        }
    }

    public function resetMensajes()
    {
        $this->mensajes = [];
        $this->actualizarMensajes();
    }

    public function dydrate()
    {
        if($this->usuario == "")
        {
            // Le pedimos el uisuario al otro componente
            $this->emit('solicitaUsuario');
        }
    }
    public function render()
    {

        return view('livewire.chat-list');
    }
}
