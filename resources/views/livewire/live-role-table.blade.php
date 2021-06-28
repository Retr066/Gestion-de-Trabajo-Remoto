@can('role read')
    <div class="md:flex flex-row">
        <div class="flex-1">
            @can('role create')
                <button wire:click="$emit('toogleModal')">
                    <span class="fa fa-plus-circle fa-2x text-purple-500"></span>
                </button>
            @endcan
            <x-table-permission caption="Roles">

                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Usos de Roles x Usuarios vila gey
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($roles as $role)


                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $role->id }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $role->name }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $role->count_user }}
                                        </div>

                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @can('role update')
                                    <span wire:click="$emit('toogleModal',{{ $role->id }},'Role')"
                                        class="px-2 cursor-pointer inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Editar
                                    </span>
                                @endcan
                                @can('role update')
                                    <span wire:click="$emit('addPermission',{{ $role->id }})"
                                        class="px-2 cursor-pointer  inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                        permisos
                                    </span>
                                @endcan
                                @if (!$role->count_user && canView('role delete'))
                                    <span wire:click="deleteRole({{ $role->id }})"
                                        class="px-2 cursor-pointer  inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        delete
                                    </span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>

            </x-table-permission>
        </div>
        <div class="flex-1 ml-3 ">
            <x-table-permission caption="Permisos">
                <thead class="bg-gray-50">

                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Usos de Permisos x Usuarios
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($permissions as $p)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $p->id }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $p->name }}
                                        </div>

                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 cursor-pointer inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $p->count_user }}
                                </span>

                                @if (!$p->count_user)
                                    <span wire:click="deletePermission({{ $p->id }})"
                                        class="px-2 cursor-pointer  inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        delete
                                    </span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>

            </x-table-permission>

        </div>
    </div>
@endcan
