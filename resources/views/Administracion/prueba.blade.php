<x-app-layout>
            <h2 class="text-center mt-8">Gestionar Usuarios</h2>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <livewire:test-table />
                    </div>
                </div>
            </div>
            @push('modals')
                <livewire:live-modal />
                <livewire:live-add-permission />
            @endpush

</x-app-layout>
