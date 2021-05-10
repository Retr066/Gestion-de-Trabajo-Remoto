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

        {{-- <div class="w-3/4 md:w-full">
        <h2 class="text-center mt-8">INFORMES DE ACTIVIDADES RECHAZADOS</h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    @livewire('test-table')
                </div>
            </div>
        </div>

    </div> --}}
        <div style="padding:15vw">
            <div>
                <label>
                    <div>Date 1</div>
                    <input placeholder="Select Date..." class=date />
                </label>
            </div>
        </div>

        <div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <!-- File Input -->
    <input type="file" wire:model="photo">

    <!-- Progress Bar -->
    <div x-show="isUploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div>
</div>

            <script>
                const fp = flatpickr(".date", {
                    "locale": "es",
                    dateFormat: "d.m.Y",
                    minDate: new Date().fp_incr(-7), //-7 dias
                    maxDate: "today" // hoy
                });

            </script>
</x-app-layout>
