<div >

    <div class="md:w-full md:p-3 md:pb-0 text-gray-500 font-bold text-3xl tracking-wider">
    Últimos 5 mensajes
    </div>

    @foreach($mensajes as $mensaje)
    <div>
        @if($mensaje["recibido"])
            <div class="sidebarcolor flex flex-col  px-2 py-1 max-w-sm mx-auto rounded-lg shadow-lg float-left m-2">
                <div class="">
                    <span class="text-base  font-medium" >{{$mensaje["mensaje"]}}</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1502791451862-7bd8c1df43a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                            class="w-8 h-8 object-cover rounded-full" alt="avatar">
                        <span class=" text-sm mx-3" >{{$mensaje["usuario"]}}</span>
                    </div>
                    <span class="font-light text-sm ">{{$mensaje["fecha"]}}</span>
                </div>
            </div>
        @else
        <div class=" flex flex-col bg-white  px-2 py-1 max-w-sm mx-auto rounded-lg shadow-lg float-right m-2">
            <div class="">
                <span class="text-base  text-gray-600 font-medium">{{$mensaje["mensaje"]}}</span>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1502791451862-7bd8c1df43a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                        class="w-8 h-8 object-cover rounded-full" alt="avatar">
                    <span class=" text-sm mx-3 text-gray-600" >{{$mensaje["usuario"]}}</span>
                </div>
                <span class="font-light text-sm text-gray-600 ">{{$mensaje["fecha"]}}</span>
            </div>
        </div>
        @endif
    </div>
@endforeach




</div>
@push('scripts')
     <script>
         // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
  var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
      cluster: '{{env('PUSHER_APP_CLUSTER')}}',
      forceTLS: true
  });

  var channel = pusher.subscribe('chat-channel');

  channel.bind('chat-event', function(data) {
      window.livewire.emit('mensajeRecibido', data);
  });

  setTimeout(function(){ window.livewire.emit('solicitaUsuario'); }, 100);
     </script>
@endpush
