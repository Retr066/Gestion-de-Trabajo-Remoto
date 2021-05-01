<div>



    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                    @if ($users->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cargo
                                    </th>

                                    <th scope="col" class="relative px-6 py-3">
                                        <span
                                            class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="{{ $user->profile_photo_url }}"
                                                        alt="{{ $user->name }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $user->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                            <div class="text-sm text-gray-500">Optimization</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Eliminar</a>
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Enviar</a>
                                        </td>
                                    </tr>

                                @endforeach
                                <!-- More people... -->
                            </tbody>
                        </table>
                        <div class="bg-white px-4 py-3  border-t border-gray-200 sm:px-6">
                            {{ $users->links() }}
                        </div>
                    @else
                        <div class="bg-white px-4 py-3  border-t border-gray-200 text-gray-500 sm:px-6">
                            No hay resultados para la Busqueda "{{ $search }}" en la pagina {{ $page }} al
                            mostrar "{{ $perPage }}" por Pagina
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>
