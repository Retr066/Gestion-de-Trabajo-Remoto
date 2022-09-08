<?php

namespace App\Http\Livewire;
use  App\Models\Chat;
use Livewire\Component;

class ChatList extends Component
{
    public $usuario;
    public $mensajes;
    protected $ultimoId;

    protected $listeners = ['mensajeRecibido', 'cambioUsuario'];

    public function mount()
    {
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
        $mensajes = Chat::orderBy("created_at", "desc")->take(5)->get();

            $datos = array();

            foreach($mensajes as $mensaje)
            {

                    $item = [
                        "id" => $mensaje->id,
                        "usuario" => $mensaje->usuario,
                        "mensaje" => $mensaje->mensaje,
                        "recibido" => ($mensaje->usuario != $this->usuario),
                        "fecha" => $mensaje->created_at->diffForHumans()
                    ];

                    array_unshift($datos, $item);
                    //array_push($this->mensajes, $item);


            }

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
                        "mensaje" => $mensaje->mensaje,
                        "recibido" => ($mensaje->usuario != $this->usuario),
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
