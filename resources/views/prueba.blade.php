<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('usuarios') }}
        </h2>
    </x-slot>
    <div class="md:flex ">
    <div class="w-1/4 ">
        @livewire('sidebar')
    </div>

    <div class="w-3/4 md:w-full">
        <h2 class="text-center mt-8">PRUEBA</h2>
        @livewire('modal')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    @livewire('test-table')
                </div>
            </div>
        </div>

    </div>
    <div>


</x-app-layout>
