<x-app-layout>
    <h2 class="text-center mt-8">Permisos de Jefatura</h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex">
                @can('Jefatura create')
                <button class="flex-1">Create</button>
                @endcan
                @can('Jefatura update')
                <button class="flex-1">Update</button>
                @endcan
                @can('Jefatura delete')
                <button class="flex-1">Delete</button>
                @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
