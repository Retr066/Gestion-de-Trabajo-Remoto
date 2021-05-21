<x-app-layout>
    <div class="md:flex ">

        <div class="md:w-1/5 ">
            @livewire('sidebar')
        </div>

        <div class="md:w-4/5" x-data="{ tab: 'foo' }">
            <div x-show="tab === 'foo'">
                <h2 class="text-center mt-8">INFORMES DE ACTIVIDADES</h2>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <livewire:informe-table />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('modals')
    <livewire:modal />
    <livewire:ver-modal />
        @endpush

</x-app-layout>
