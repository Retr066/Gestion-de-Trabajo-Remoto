<div>
    <x-table>
        <div class="flex bg-white px-4 py-3  sm:px-6">

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
                <thead class="cabeceratable">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                            N°
                            <button wire:click="sortable('id')">
                                <span class="fa fa{{ $camp === 'id' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                            Correo de Usuario
                            <button wire:click="sortable('email')">
                                <span class="fa fa{{ $camp === 'email' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                            Personal
                            <button wire:click="sortable('name')">
                                <span class="fa fa{{ $camp === 'name' ? $icon : '-circle' }}"></span>
                            </button>
                            <button wire:click="sortable('lastname')">
                                <span class="fa fa{{ $camp === 'lastname' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                            Area
                            <button wire:click="sortable('fecha_inicio_realizadas')">
                                <span
                                    class="fa fa{{ $camp === 'fecha_inicio_realizadas' ? $icon : '-circle' }}"></span>
                            </button>

                        </th>


                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                            Fecha de Envio
                            <button wire:click="sortable('updated_at')">
                                <span class="fa fa{{ $camp === 'updated_at' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                            Estado
                            <button wire:click="sortable('estado')">
                                <span class="fa fa{{ $camp === 'estado' ? $icon : '-circle' }}"></span>
                            </button>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span
                                class="text-left text-xs font-medium  uppercase tracking-wider">Acciones</span>
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
                                <div class="text-sm text-gray-900">{{ $informe->r_user->email }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $informe->r_user->name }}
                                    {{ $informe->r_user->lastname }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $informe->r_area->nombre_area }}
                                </div>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $informe->updated_at }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">{{ $informe->estado_cambiado }}</span>
                            </td>


                            <td class="flex px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                @can('Jefatura read')
                                    <button wire:click="$emitTo('ver-modal','ShowModal',{{ $informe->id }})"
                                        class=" text-indigo-400 hover:text-indigo-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @endcan
                                @can('Jefatura create')
                                    <a href="{{ route('pdf', $informe->id) }}" target="_blank" class="text-gray-400 hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endcan
                                @can('Jefatura update')
                                    <button onclick="aprobarInforme({{ $informe->id }})"
                                        class="text-green-400 hover:text-green-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @endcan
                                @can('Jefatura delete')
                                    <button wire:click="$emit('rechazarInforme',{{ $informe->id }})"
                                        class="text-red-400 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @endcan
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

@push('scripts')
    <script>
        function aprobarInforme(informe) {
            Swal.fire({
                title: 'Estas Seguro de Aprobar?',
                text: "No habra Vuelta Atras!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Apruebalo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('aprobarInforme', informe)

                }
            })
        }
        Livewire.on('deleteInforme', (informe) => {
            Swal.fire(
                'Aprobado!',
                `El Informe ${informe.id} se aprobo corrrectamente`,
                'success'
            )
        });

    </script>
@endpush
