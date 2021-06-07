<div>
    <x-component-modal :showModal="$showModal" :action="$action">
        <div class="w-full">
            <h3 class="w-full text-center mt-3 text-gray-600 mb-3"> Permisos Registrados</h3>
            <hr>
            <div class="w-full text-gray-600">
                @foreach ($permission_check as $key => $p)
                    <div class="flex flex-row mb-1">
                        <div class="mr-2 text-blue-600 w-1/12">
                        <span class="fa {{ $p['check'] ? 'fa-check' : '' }}"></span>
                    </div>
                        <div class="w-3/4">
                            {{ $key }}
                        </div>
                        <div class="w-3/4">
                            <input
                            wire:model="permission_check.{{ $key }}.check"
                            wire:click="addPermissionKey('{{ $key}}')"
                            type="checkbox" class="bg-blue-100">
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </x-component-modal>
</div>
