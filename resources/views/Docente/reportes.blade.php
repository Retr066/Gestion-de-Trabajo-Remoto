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
        <h2 class="text-center mt-8">Reportes</h2>
    </div>
    <div>
    </x-app-layout>
