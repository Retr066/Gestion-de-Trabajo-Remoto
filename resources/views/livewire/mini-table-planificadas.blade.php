<div>

    <table class="table-auto md:w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3">ID</th>
            <th class="px-4 py-3">Informe Asociado</th>
            <th class="px-4 py-3">Rubro</th>
            <th class="px-4 py-3">Descripcion</th>
            <th class="px-4 py-3">Horas</th>
            <th class="px-4 py-3">Acciones</th>
        </tr>
        @foreach ($informesPlanificadas as $informesPlanificada)


            <tr class="bg-gray-100 border-b border-gray-200">
                <x-component-td> {{ $informesPlanificada->id }} </x-component-td>
                <x-component-td> {{ $informesPlanificada->id_informe_planificadas }} </x-component-td>
                <x-component-td> {{ $informesPlanificada->nombre_rubro_planificadas }} </x-component-td>
                <td style="max-width: 10rem;" class="px-4 py-3 break-words">
                    {{ $informesPlanificada->descripcion_rubro_planificadas }}</td>
                <x-component-td> {{ $informesPlanificada->horas_solas_planificas }} </x-component-td>
                <x-component-td>

                    <button wire:click="updateDescripcionPla({{ $informesPlanificada }})"
                        class="text-yellow-400 hover:text-yellow-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button {{ $can_submit ? '' : 'disabled' }}
                        wire:click="deleteDescripcion({{ $informesPlanificada->id }})"
                        class="text-red-400 hover:text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-component-td>
            </tr>
        @endforeach
    </table>
    <div class="-mx-3 md:flex  justify-end items-end">
        <div class='md:w-2/5  px-5 md:flex flex-col justify-center items-center'>
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
                Horas Totales </label>
            <!-- Contador -->
            <input wire:model="horas_total_planificadas"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                id="grid-city" type="number" placeholder="0" readonly>
        </div>

    </div>
</div>
