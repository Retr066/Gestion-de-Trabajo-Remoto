<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('usuarios') }}
        </h2>
    </x-slot>
    <div class="md:flex ">
        <div class="md:w-1/5 ">
            @livewire('sidebar')
        </div>

        <div class="md:w-4/5 ">
            <h2 class="text-center mt-8">INFORMES DE ACTIVIDADES PLANIFICADAS</h2>
            @livewire('modal')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                        @livewire('informe-table')
                    </div>
                </div>
            </div>

        </div>
     <div>


</x-app-layout>
