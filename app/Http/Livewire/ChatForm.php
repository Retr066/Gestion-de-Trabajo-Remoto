<?php

namespace App\Http\Livewire;
use App\Events\Notification;
use Livewire\Component;
use  App\Models\Chat;
class ChatForm extends Component
{
    public $usuario;
    public $mensaje;

    // Generar datos para pruebas
    private $faker;

    // Mantenemos estos valores actualizados en
    // la barra de direcciones...
    // Ej.: https://your-app.com/?usuario=Pedro
    protected $updatesQueryString = ['usuario'];

    // Eventos Recibidos
    protected $listeners = ['solicitaUsuario'];

    // Cuando se Inicia el Componente (antes de Render)
    public function mount()
    {
        // Instanciamos Faker
        $this->faker = \Faker\Factory::create();

        // Obtenemos el valor de usuario de la barra de direcciones
        // si no existe, generamos uno con Faker
        $this->usuario = request()->query('usuario', $this->usuario) ?? $this->faker->name;

        // Generamos el primer texto de prueba
        $this->mensaje = $this->faker->realtext(20);
    }

    // Cuando el otro componente nos solicitan el usuario
    public function solicitaUsuario()
    {
        // Lo emitimos por evento
        $this->emit('cambioUsuario', $this->usuario);
    }

    // Cuando actualizamos el nombre de usuario
    public function updatedUsuario()
    {
        // Notificamos al otro componente el cambio
        $this->emit('cambioUsuario', $this->usuario);
    }

    // Se produce cuando se actualiza cualquier dato por Binding
    public function updated($field)
    {
        // Solo validamos el campo que genera el update
        $validatedData = $this->validateOnly($field, [
            'usuario' => 'required',
            'mensaje' => 'required',
        ]);
    }

    public function enviarMensaje()
    {
        $validatedData = $this->validate([
            'usuario' => 'required',
            'mensaje' => 'required',
        ]);

        // Guardamos el mensaje en la BBDD
        Chat::create([
            "usuario" => $this->usuario,
            "mensaje" => $this->mensaje
        ]);

        // Generamos el evento para Pusher
        // Enviamos en la "push" el usuario y mensaje (aunque en este ejemplo no lo utilizamos)
        // pero nos vale para comprobar en PusherDebug (y por consola) lo que llega...
        event(new \App\Events\Notificacion($this->usuario, $this->mensaje));

        // Este evento es para que lo reciba el componente
        // por Javascript y muestre el ALERT BOOSTRAP de "enviado"
        $this->emit('enviadoOK', $this->mensaje);

        // Creamos un nuevo texto aleatorio (para el próximo mensaje)
        $this->faker = \Faker\Factory::create();
        $this->mensaje = $this->faker->realtext(20);

    }
    public function render()
    {
        return view('livewire.chat-form');
    }
}
