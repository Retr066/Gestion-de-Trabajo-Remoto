<x-app-layout>

                <h2 class="text-center mt-8">INFORMES DE ACTIVIDADES</h2>
                <div class="py-12 px-8">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <livewire:informe-table />
                        </div>
                    </div>
                </div>

    @push('modals')
    <livewire:modal />
    <livewire:ver-modal />
        @endpush

</x-app-layout>
