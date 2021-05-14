<x-app-layout>
    <div class="md:flex ">

        <div class="md:w-1/5 ">
            @livewire('sidebar')
        </div>

        <div class="md:w-4/5" x-data="{ tab: 'foo' }">
            <div x-show="tab === 'foo'">
                <h2 class="text-center mt-8">INFORMES DE ACTIVIDADES</h2>

                {{-- <div style="position: absolute;right: 0; display: inline-flex;" class=" md:flex inline-block  mr-8">
                    <button
                        class="w-50 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium "
                        :class="{ 'active': tab === 'bar' }" @click="tab = 'bar'">
                        <i class="fas fa-arrow-circle-right mr-2"></i>Planificadas</button>
                </div> --}}
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <livewire:informe-table />
                        </div>
                    </div>
                </div>
            </div>
        </div>
       {{--  <div style="display:none;" x-show="tab === 'bar'">
            <x-layout></x-layout>
        </div> --}}


    </div>
    @push('modals')
    <livewire:modal />
    <livewire:ver-modal />
        @endpush

</x-app-layout>
