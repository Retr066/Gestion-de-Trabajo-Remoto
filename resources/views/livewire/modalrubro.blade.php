<div>
<form wire:submit.prevent="{{$method}}">
  <x-component-modal-rubro :showModal="$showModal" :action="$action">
  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
      <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                {{ $nombreModal }}
                </h3>
            <div class="mt-3">
              <div class="flex">
              <x-component-input-rubro placeholder="Ingrese el rubro" name="name" label="Rubro" type="text"></x-component-input-rubro>
            </div>
          </div>
</div>
</x-component-modal-rubro>
</form>
</div>
