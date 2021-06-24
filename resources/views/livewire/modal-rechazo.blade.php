<div>
    <form wire:submit.prevent='{{ $method }}'>
        <x-component-modal :showModal="$showModal" :action="$action">
            <div class="md:w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    {{ $nombreModal }}
                </h3>
                <div class="mt-5 -mx-3 md:flex mb-3 flex-col justify-center items-around">
                    <div class="md:w-full px-3  mb-6">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-zip">
                            Detalle el Motivo de Rechazo del Informe </label>
                        <textarea wire:model="respuesta"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                            rows="4"></textarea>
                        @error('respuesta') <span class="error text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </x-component-modal>
    </form>
</div>
