<div>

    <x-jet-dialog-modal wire:model="abrir">

        <x-slot name="title">
            Visualizar los datos Registrados
        </x-slot>
        <x-slot name="content">
            <!-- component -->
            <!-- This is an example component -->
            <div class="h-screen custom-scrollbar" style="overflow-y: auto; ">

                <style>
                    [x-cloak] {
                        display: none;
                    }

                    [type="checkbox"] {
                        box-sizing: border-box;
                        padding: 0;
                    }

                    .form-checkbox,
                    .form-radio {
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                        -webkit-print-color-adjust: exact;
                        color-adjust: exact;
                        display: inline-block;
                        vertical-align: middle;
                        background-origin: border-box;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        flex-shrink: 0;
                        color: currentColor;
                        background-color: #fff;
                        border-color: #e2e8f0;
                        border-width: 1px;
                        height: 1.4em;
                        width: 1.4em;
                    }

                    .form-checkbox {
                        border-radius: 0.25rem;
                    }

                    .form-radio {
                        border-radius: 50%;
                    }

                    .form-checkbox:checked {
                        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
                        border-color: transparent;
                        background-color: currentColor;
                        background-size: 100% 100%;
                        background-position: center;
                        background-repeat: no-repeat;
                    }

                    .form-radio:checked {
                        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
                        border-color: transparent;
                        background-color: currentColor;
                        background-size: 100% 100%;
                        background-position: center;
                        background-repeat: no-repeat;
                    }

                    ::-webkit-scrollbar {
                        width: 20px;
                    }

                    ::-webkit-scrollbar-track {
                        background-color: transparent;
                    }

                    ::-webkit-scrollbar-thumb {
                        background-color: #d6dee1;
                        border-radius: 20px;
                        border: 6px solid transparent;
                        background-clip: content-box;
                    }

                    ::-webkit-scrollbar-thumb:hover {
                        background-color: #a8bbbf;
                    }

                </style>

                <div x-data="{ step: @entangle('count')}" x-cloak>
                    <div class="max-w-3xl mx-auto ">
                        <div x-show.transition="step != 'complete'">
                            <!-- Top Navigation -->
                            <div class="border-b-2 py-4">
                                <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                    x-text="`Step: ${step} de 2`"></div>
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div x-show="step === 1">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">Informes
                                                Realizadas</div>
                                        </div>

                                        <div x-show="step === 2">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">Informes
                                                Planificadas</div>
                                        </div>


                                    </div>

                                    <div class="flex items-center md:w-64">
                                        <div class="w-full bg-white rounded-full mr-2">
                                            <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                                :style="'width: '+ parseInt(step /2 * 100) +'%'"></div>
                                        </div>
                                        <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 2 * 100) +'%'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Top Navigation -->

                            <!-- Step Content -->
                            <div class="py-10">
                                <div x-show.transition.in="step === 1">
                                    <!-- component -->
                                    <!-- component -->
                                    <div class=" w-full lg:flex">
                                        @foreach ($informes as $informe)
                                            @if ($informe->r_user->profile_photo_path == null)
                                                <img class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                                                    src="{{ $informe->r_user->image_user }}"
                                                    alt="{{ $informe->r_user->name }} ">
                                            @else
                                                <img class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                                                    src="{{ asset('storage/' . $informe->r_user->profile_photo_path) }}"
                                                    alt="{{ $informe->r_user->name }} ">
                                            @endif
                                            <div
                                                class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                                <div class="mb-8">
                                                    <p class="text-sm text-grey-dark flex items-center">
                                                        <svg class="text-grey w-3 h-3 mr-2"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path
                                                                d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                                        </svg>
                                                        Reporte de Actividades del Area de
                                                        {{ $informe->r_area->nombre_area }}.
                                                    </p>
                                                    <div class="text-black font-bold text-xl mb-2">
                                                        {{ $informe->r_user->name }}
                                                        {{ $informe->r_user->lastname }}</div>
                                                    <p class="text-grey-darker text-base">Estan Actividades Realizadas
                                                        fueron
                                                        realizadas en un periodo de tiempo,como fecha inicio es
                                                        :<b>{{ $informe->fecha_inicio_realizadas }}</b> hasta la fecha
                                                        fin de
                                                        <b> {{ $informe->fecha_fin_realizadas }}</b>.
                                                    </p>
                                                </div>
                                                <div class="flex items-center">

                                                    <div class="text-sm">
                                                        <p class="text-black leading-none">Horas Totales Invertidas</p>
                                                        <p class="text-grey-dark">
                                                            <b>{{ $informe->horas_total_realizadas }}</b> horas.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    @endforeach
                                    <div class="grid  md:grid-cols-2 ">
                                        @foreach ($informesRealizadas as $informesRealizada)
                                            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                                                <div class="mt-8">
                                                    <p class="text-xl font-semibold my-2">
                                                        {{ $informesRealizada->nombre_rubro_realizadas }}</p>
                                                    <div class="flex space-x-2 text-gray-400 text-sm break-words">
                                                        <p class="w-full">
                                                            {{ $informesRealizada->descripcion_rubro_realizadas }}
                                                        </p>
                                                    </div>

                                                    <div class="border-t-2 "></div>
                                                    @foreach ($informes as $informe)
                                                        <div class="flex justify-between">
                                                            @if ($informe->r_user->profile_photo_path == null)
                                                                <div class="my-2">
                                                                    <p class="font-semibold text-base mb-2">Autor</p>
                                                                    <div class="flex space-x-2">
                                                                        <img src="{{ $informe->r_user->image_user }}"
                                                                            alt="{{ $informe->r_user->name }} "
                                                                            class="w-6 h-6 rounded-full" />

                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="my-2">
                                                                    <p class="font-semibold text-base mb-2">Autor</p>
                                                                    <div class="flex space-x-2">
                                                                        <img src="{{ asset('storage/' . $informe->r_user->profile_photo_path) }}"
                                                                            alt="{{ $informe->r_user->name }} "
                                                                            class="w-6 h-6 rounded-full" />

                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="my-2">
                                                                <p class="font-semibold text-base mb-2">Horas</p>
                                                                <div class="text-base text-gray-400 font-semibold">
                                                                    <p>{{ $informesRealizada->horas_solas_realizadas }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div x-show.transition.in="step === 2">
                                    <!-- component -->
                                    <div class=" w-full lg:flex">
                                        @foreach ($informes as $informe)
                                            @if ($informe->r_user->profile_photo_path == null)
                                                <img class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                                                    src="{{ $informe->r_user->image_user }}"
                                                    alt="{{ $informe->r_user->name }} ">
                                            @else
                                                <img class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                                                    src="{{ asset('storage/' . $informe->r_user->profile_photo_path) }}"
                                                    alt="{{ $informe->r_user->name }} ">
                                            @endif
                                            <div
                                                class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                                <div class="mb-8">
                                                    <p class="text-sm text-grey-dark flex items-center">
                                                        <svg class="text-grey w-3 h-3 mr-2"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path
                                                                d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                                        </svg>
                                                        Reporte de Actividades del Area de
                                                        {{ $informe->r_area->nombre_area }}.
                                                    </p>
                                                    <div class="text-black font-bold text-xl mb-2">
                                                        {{ $informe->r_user->name }}
                                                        {{ $informe->r_user->lastname }}</div>
                                                    <p class="text-grey-darker text-base">Estan Actividades Planificadas
                                                        fueron
                                                        realizadas en un periodo de tiempo,como fecha inicio es
                                                        :<b>{{ $informe->fecha_inicio_planificadas }}</b> hasta la
                                                        fecha
                                                        fin de
                                                        <b> {{ $informe->fecha_fin_planificadas }}</b>.
                                                    </p>
                                                </div>
                                                <div class="flex items-center">

                                                    <div class="text-sm">
                                                        <p class="text-black leading-none">Horas Totales Invertidas</p>
                                                        <p class="text-grey-dark">
                                                            <b>{{ $informe->horas_total_planificadas }}</b> horas.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    @endforeach
                                    <div class="grid  md:grid-cols-2 ">
                                        @foreach ($informesPlanificadas as $informesPlanificada)
                                            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
                                                <div class="mt-8">
                                                    <p class="text-xl font-semibold my-2">
                                                        {{ $informesPlanificada->nombre_rubro_planificadas }}</p>
                                                    <div class="flex space-x-2 text-gray-400 text-sm break-words">
                                                        <p class="w-full">
                                                            {{ $informesPlanificada->descripcion_rubro_planificadas }}
                                                        </p>
                                                    </div>

                                                    <div class="border-t-2 "></div>

                                                    @foreach ($informes as $informe)
                                                        <div class="flex justify-between">
                                                            @if ($informe->r_user->profile_photo_path == null)
                                                                <div class="my-2">
                                                                    <p class="font-semibold text-base mb-2">Autor</p>
                                                                    <div class="flex space-x-2">
                                                                        <img src="{{ $informe->r_user->image_user }}"
                                                                            alt="{{ $informe->r_user->name }} "
                                                                            class="w-6 h-6 rounded-full" />

                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="my-2">
                                                                    <p class="font-semibold text-base mb-2">Autor</p>
                                                                    <div class="flex space-x-2">
                                                                        <img src="{{ asset('storage/' . $informe->r_user->profile_photo_path) }}"
                                                                            alt="{{ $informe->r_user->name }} "
                                                                            class="w-6 h-6 rounded-full" />

                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="my-2">
                                                                <p class="font-semibold text-base mb-2">Horas</p>
                                                                <div class="text-base text-gray-400 font-semibold">
                                                                    <p>{{ $informesRealizada->horas_solas_realizadas }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <!-- / Step Content -->
                        </div>
                    </div>

                    <!-- Bottom Navigation -->
                    <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
                        <div class="max-w-3xl mx-auto px-4">
                            <div class="flex justify-between">
                                <div class="w-1/2">
                                    <button x-show="step > 1" @click="step--"
                                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Atras</button>
                                </div>

                                <div class="w-1/2 text-right">
                                    <x-jet-secondary-button wire:click="cerrar()" x-show="step < 2">Cerrar
                                        </x-jet-secundary-button>
                                        <button x-show="step < 2" @click="step++"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Siguiente</button>

                                        <x-jet-button x-show="step === 2" wire:click="cerrar()">Cerrar
                                            </x-jet-secundary-button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
                </div>



        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
</div>
