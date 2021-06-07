<x-app-layout>
    <h2 class="text-center mt-8">Roles y Permisos del Sistema</h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <livewire:live-role-table />

        </div>
    </div>
    @push('modals')
    <livewire:live-modal-edit-permission/>
    <livewire:live-add-permission />
@endpush
</x-app-layout>
