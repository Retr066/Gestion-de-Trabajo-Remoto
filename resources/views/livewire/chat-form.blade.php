<div>
    <div class="md:w-full md:p-3  md:flex md:flex-col bg-white overflow-hidden shadow-xl sm:rounded-lg content-evenly">
        <div class="md:w-full font-bold text-3xl tracking-wider">
            Chat Global Para Docentes y Jefes
        </div>
        <div class="md:w-full md:py-5">
            <div class="md:w-full md:mb-3 font-bold text-xl tracking-wider" >
                Usuario
            </div>
            <div>
                    <input type="text" wire:model="usuario" id="usuario"
                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                @error("usuario")
                    <small class="text-red-600">{{ $message }}</small>
                @else
                    <small class="text-gray-500">Usted es: {{$usuario}}</small>
                @enderror
            </div>
        </div>

        <div class="md:w-full md:pb-5">
             <div class="md:w-full md:mb-3 font-bold text-xl tracking-wider" >
                Mensaje
            </div>
            <div >
                    <input type="text" wire:model="mensaje" wire:keydown.enter="enviarMensaje" id="mensaje" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                @error("mensaje")
                <small class="text-red-600">{{ $message }}</small>
                @else
                <small class="text-gray-500">Escribe tu mensaje y teclea <code>ENTER</code> para enviarlo</small>
                @enderror
            </div>

        </div>

        <div wire:offline class="bg-red-400 md:w-1/3 md:my-3 text-center  rounded-md text-white">
       <strong>Se ha perdido la conexión a Internet</strong>
        </div>

        <div class="md:w-full md:pb-5">
                <div  class="md:w-1/3 text-white ">
                        <div style="position: absolute; display:none"
                        class="bg-green-400 rounded-md p-2 "
                        role="alert"
                        id="avisoSuccess"
                        >Se ha enviado</div>
                </div>
                <div class=" pt-2 text-right">
                        <button
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-700 text-base font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click="enviarMensaje"
                            wire:loading.attr="disabled"
                            wire:offline.attr="disabled"
                        >Enviar Mensaje</button>
                </div>
        </div>
    </div>
</div>
@push('scripts')
     <script>
           $( document ).ready(function() {
            window.livewire.on('enviadoOK', function () {
                $("#avisoSuccess").fadeIn("slow");
                setTimeout(function(){ $("#avisoSuccess").fadeOut("slow"); }, 3000);
            });
        });

     </script>
@endpush
