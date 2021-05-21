<div>

    <x-table>
        <div class="flex bg-white px-4 py-3  sm:px-6">
                <button wire:click="abrirModal()" class="form-input rounded-md shadow  px-3 py-1 mt-1 mr-6 block" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600 " fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                </svg>
                        </button>
            <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text"
                placeholder="Buscar...">
            <div class="form-input rounded-md shadow-sm mt-1 ml-6 block ">
                <select wire:model="perPage" class="ouline-none text-gray-500 text-sm">
                    <option value="5">5 por Pagina</option>
                    <option value="10">10 por Pagina</option>
                    <option value="15">15 por Pagina</option>
                    <option value="50">50 por Pagina</option>
                    <option value="100">100 por Pagina</option>
                </select>
            </div>
            @if ($search !== '')
                <button wire:click="clear" class="form-input rounded-md shadow px-3 mt-1 ml-6 block">
                    X
                </button>
            @endif

        </div>
        @if ($informes->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                            <button wire:click="sortable('id')">
                                <span class="fa fa{{ $camp === 'id' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Id Asociado
                            <button wire:click="sortable('id')">
                                <span class="fa fa{{ $camp === 'id' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha de Creacion
                            <button wire:click="sortable('created_at')">
                                <span class="fa fa{{ $camp === 'created_at' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Periodo
                        <button wire:click="sortable('fecha_inicio_realizadas')">
                            <span
                                class="fa fa{{ $camp === 'fecha_inicio_realizadas' ? $icon : '-circle' }}"></span>
                        </button>
                        <button wire:click="sortable('fecha_fin_realizadas')">
                            <span class="fa fa{{ $camp === 'fecha_fin_realizadas' ? $icon : '-circle' }}"></span>
                        </button>
                         </th>


                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            HORAS TOTALES
                            <button wire:click="sortable('horas_total_realizadas')">
                                <span
                                    class="fa fa{{ $camp === 'horas_total_realizadas' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                            <button wire:click="sortable('estado')">
                                <span class="fa fa{{ $camp === 'estado' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span
                                class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                  @foreach ($informes as $informe)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $informe->id }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $informe->usuario_id }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $informe->created_at }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $informe->fecha_inicio_realizadas }}/{{ $informe->fecha_fin_realizadas }}
                                </div>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $informe->horas_total_realizadas }}</div>

                                </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $informe->estado }}</div>


                            </td>


                            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">

                                <button wire:click="abrirModal2()" class=" text-indigo-400
                                hover:text-indigo-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                    <button wire:click="" class="text-gray-400 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                    </svg>
                                    </button>
                                    <button wire:click="editModal()" class="text-yellow-400 hover:text-yellow-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <button wire:click="destroy({{ $informe->id }})"
                                        class="text-red-400 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <button wire:click="" class="text-green-400 hover:text-green-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>

                            </td>
                        </tr>

                    @endforeach
                    <!-- More people... -->
                </tbody>

            </table>

            <div class="bg-white px-4 py-3  border-t border-gray-200 sm:px-6">
                {{ $informes->links() }}
            </div>
        @else
            <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                No hay resultados para la Busqueda "{{ $search }}" en la pagina {{ $page }} al
                mostrar "{{ $perPage }}" por Pagina
            </div>
        @endif


    </x-table>

</div>
