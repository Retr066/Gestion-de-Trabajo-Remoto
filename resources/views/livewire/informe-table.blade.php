<div>

    <x-table>
        <div class="flex bg-white px-4 py-3  sm:px-6">
            @can('Docente create')
                <button onclick="abrirInforme()" class="form-input rounded-md shadow  px-3 py-1 mt-1 mr-6 block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600 " fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            @endcan
            <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text"
                placeholder="Buscar...">
            <div class="form-input rounded-md shadow-sm mt-1 ml-6 block ">
                <select wire:model="informe_estado" class="ouline-none text-gray-500 text-sm">
                    <option value="">Seleccione</option>
                    <option value="generado">Generado</option>
                    <option value="enviado_recursos">Aprobado</option>
                    <option value="enviado_jefatura">Enviado</option>
                    <option value="archivado">Archivado</option>
                </select>
            </div>
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
                            N°
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
                            Fecha de Ultima Actualizacion
                            <button wire:click="sortable('updated_at')">
                                <span class="fa fa{{ $camp === 'updated_at' ? $icon : '-circle' }}"></span>
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
                                <div class="text-sm text-gray-900">{{ $informe->created_at }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $informe->updated_at }}
                                </div>
                            </td>
                            @if ($informe->estado_cambiado == 'Generado')
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $informe->estado_cambiado }}</span>
                                </td>
                            @elseif($informe->estado_cambiado == 'Enviado')
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">{{ $informe->estado_cambiado }}</span>
                                </td>
                            @elseif ($informe->estado_cambiado == 'Aprobado')
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ $informe->estado_cambiado }}</span>
                                </td>
                             @elseif ($informe->estado_cambiado == 'Archivado')
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $informe->estado_cambiado }}</span>
                                </td>
                            @endif



                            <td class="flex px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                @can('Docente read')
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
                                @can('Docente create')
                                    <a href="{{ route('pdf', $informe->id) }}" class="text-gray-400 hover:text-gray-700"
                                        target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endcan
                                @if ($informe->estado_cambiado == 'Generado')
                                    @can('Docente update')
                                        <button wire:click="$emit('editModal',{{ $informe }})"
                                            class="text-yellow-400 hover:text-yellow-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    @endcan
                                    @can('Docente delete')
                                        <button onclick="borrarInforme({{ $informe->id }})"
                                            class="text-red-400 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    @endcan
                                    @can('Docente delete')
                                        <button onclick="enviarInforme({{ $informe->id }})"
                                            class="text-green-400 hover:text-green-700">
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
                                    @endcan
                                @endif
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
                mostrar "{{ $perPage }}" por Pagina con estado de {{ $informe_estado }}.
            </div>
        @endif



    </x-table>



</div>

@push('scripts')
    <script>
        function borrarInforme(informe) {
            Swal.fire({
                title: 'Estas Seguro?',
                text: "No habra Vuelta Atras!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borralo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteInformeList', informe)

                }
            })
        }
        Livewire.on('deleteInforme', (informe) => {
            Swal.fire(
                'Borrado!',
                `El usuario ${informe.id} se borro corrrectamente`,
                'success'
            )
        });

        function enviarInforme(informe) {
            Swal.fire({
                title: 'Estas Seguro de Enviar?',
                text: "No habra Vuelta Atras!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Envialo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('enviarInforme', informe)

                }
            })
        }
        Livewire.on('listEnviar', (informe) => {
            Swal.fire(
                'Enviado!',
                `El informe ${informe.id} se envio corrrectamente`,
                'success'
            )
        });

        function abrirInforme() {
            Swal.fire({
                title: 'Nuevo Informe?',
                text: "Desea Crear un Nuevo Informe!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Crealo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('abrirModal')

                }
            })
        };

    </script>
@endpush
