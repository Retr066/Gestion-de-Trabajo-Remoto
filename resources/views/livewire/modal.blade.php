<div>
    <x-jet-dialog-modal data-background="static" wire:model="open">

        <x-slot name="title">
            {{ $tituloModal }}
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

                                    <div class="-mx-3 md:flex mb-6">
                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0 ">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 "
                                                for="grid-first-name">
                                                Area
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3 "
                                                type="text" value="{{ Auth::user()->r_area->nombre_area }}" readonly>
                                            <!-- <p class="text-red text-xs italic">Porfavor Rellena Este Campo</p> -->
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Correo Electronico
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                type="text" value="{{ Auth::user()->email }}" readonly>
                                            <!--  <p class="text-red text-xs italic">Porfavor Rellena Este Campo.</p> -->
                                        </div>
                                    </div>
                                    <!--
                                    OO
                                     -->
                                    <div class="-mx-3 md:flex mb-6">
                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-first-name">
                                                Nombres
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                                type="text" value="{{ Auth::user()->name }}" readonly>
                                            <!-- <p class="text-red text-xs italic">Porfavor Rellena Este Campo</p> -->
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Apellidos
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                type="text" value="{{ Auth::user()->lastname }}" readonly>
                                            <!--  <p class="text-red text-xs italic">Porfavor Rellena Este Campo.</p> -->
                                        </div>
                                    </div>
                                    <div class="-mx-3 md:flex mb-7">
                                        {{-- <div class="w-full px-3 ">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                              Periodo
                                            </label>
                                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="date" type="text" placeholder="Seleccione Periodo" autocomplete="off" >

                                          </div> --}}



                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-city">
                                                Fecha Inicio
                                            </label>
                                            <input wire:model="fecha_inicio_realizadas" type="text"
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 "
                                                id="date" placeholder="dd/mm/aa" autocomplete="off" data-input>
                                            @error('fecha_inicio_realizadas') <span
                                                class="error text-red-700">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-zip">
                                                Fecha Fin
                                            </label>
                                            <input type="text" wire:model="fecha_fin_realizadas"
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4  "
                                                id="date1" placeholder="dd/mm/aa" autocomplete="off" data-input>
                                            @error('fecha_fin_realizadas') <span
                                                class="error text-red-700">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <!-- TABLA  -->
                                    <div class="-mx-3 md:flex mb-3     flex-col justify-center items-around">
                                        <div class="md:w-full px-3  md:flex mb-6  flex-row justify-around items-center">
                                            <div class=" md:w-2/5   flex flex-col justify-center items-start">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-zip">
                                                    Rubro </label>
                                                <!-- rubro seleccionar -->
                                                <select wire:model="nombre_rubro_realizadas"
                                                    class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                                    id="grid-state">
                                                    <option value="" selected disabled>Selecciona mano... </option>
                                                    @foreach ($rubros as $key => $rubro)
                                                        <option value="{{ $rubro->nombre_rubro }}">
                                                            {{ $rubro->nombre_rubro }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                @error('nombre_rubro_realizadas') <span
                                                    class="error text-red-700">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="md:w-2/5  px-5 flex flex-col justify-center items-start">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-zip">
                                                    Horas Dedicadas </label>
                                                <!-- Contador -->
                                                <input wire:model="horas_solas_realizadas"
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                    id="grid-city" type="number" value="0" placeholder="0">

                                                @error('horas_solas_realizadas') <span
                                                    class="error text-red-700">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="md:w-1/3 flex  justify-center items-center mt-7">
                                                @if ($hidden2 == 'hidden')
                                                    <x-jet-button wire:click="saveDescripcion()" class="{{ $hidden }} flex justify-center items-center
                                                            rounded-full h-10 w-20"><i
                                                            class="text-4xl fas fa-plus"></i></x-jet-button>
                                                @endif
                                                @if ($hidden2 == '')
                                                    <x-jet-button wire:click="updateRealizadas()" class=" {{ $hidden2 }}  flex justify-center items-center
                                                        rounded-full h-10 w-20"> <i
                                                            class="text-4xl fas fa-pen-square"></i>
                                                    </x-jet-button>
                                                @endif
                                            </div>


                                        </div>

                                        <div class="md:w-full px-3  mb-6">
                                            <textarea wire:model="descripcion_rubro_realizadas"
                                                class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                                rows="4"></textarea>
                                            @error('descripcion_rubro_realizadas') <span
                                                class="error text-red-700">{{ $message }}</span> @enderror
                                        </div>

                                    </div>

                                    <livewire:mini-table />

                                </div>
                                <div x-show.transition.in="step === 2">
                                    <!-- component -->

                                    <div class="-mx-3 md:flex mb-6">
                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-first-name">
                                                Area
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                                value="{{ Auth::user()->r_area->nombre_area }}" type="text"
                                                placeholder="Ingenieria de Sistemas" readonly>
                                            <!-- <p class="text-red text-xs italic">Porfavor Rellena Este Campo</p> -->
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Correo Electronico
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                type="text" value="{{ Auth::user()->email }}" readonly>
                                            <!--  <p class="text-red text-xs italic">Porfavor Rellena Este Campo.</p> -->
                                        </div>
                                    </div>
                                    <div class="-mx-3 md:flex mb-6">
                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-first-name">
                                                Nombres
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                                type="text" value="{{ Auth::user()->name }}" readonly>
                                            <!-- <p class="text-red text-xs italic">Porfavor Rellena Este Campo</p> -->
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Apellidos
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                type="text" value="{{ Auth::user()->lastname }}" readonly>
                                            <!--  <p class="text-red text-xs italic">Porfavor Rellena Este Campo.</p> -->
                                        </div>
                                    </div>
                                    <div class="-mx-3 md:flex mb-7">

                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label
                                                class=" block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-city">
                                                Fecha Inicio
                                            </label>
                                            <input type="text" wire:model="fecha_inicio_planificadas"
                                                class="  appearance-none  block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4  "
                                                id="date2" placeholder="dd/mm/aa" autocomplete="off">
                                            @error('fecha_inicio_planificadas') <span
                                                class="error text-red-700">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class=" block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-zip">
                                                Fecha Fin
                                            </label>
                                            <input type="text" wire:model="fecha_fin_planificadas"
                                                class="  appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4  "
                                                id="date3" placeholder="dd/mm/aa" autocomplete="off">
                                            @error('fecha_fin_planificadas') <span
                                                class="error text-red-700">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <!-- TABLA  -->
                                    <div class="-mx-3 md:flex mb-3     flex-col justify-center items-around">
                                        <div class="md:w-full px-3  md:flex mb-6  flex-row justify-around items-center">
                                            <div class=" md:w-2/5   flex flex-col justify-center items-start">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-zip">
                                                    Rubro </label>
                                                <!-- rubro seleccionar -->
                                                <select wire:model="nombre_rubro_planificadas"
                                                    class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                                    id="grid-state">
                                                    <option value="" selected disabled>Selecciona mano... </option>
                                                    @foreach ($rubros as $key => $rubro)
                                                        <option value='{{ $rubro->nombre_rubro }}'>
                                                            {{ $rubro->nombre_rubro }}</option>
                                                    @endforeach
                                                    @error('nombre_rubro_planificadas') <span
                                                        class="error text-red-700">{{ $message }}</span> @enderror
                                                </select>
                                            </div>
                                            <div class="md:w-2/5  px-5 flex flex-col justify-center items-start">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-zip">
                                                    Horas Dedicadas </label>
                                                <!-- Contador -->
                                                <input wire:model="horas_solas_planificas"
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                    id="grid-city" type="number" placeholder="0">
                                                @error('horas_solas_planificas') <span
                                                    class="error text-red-700">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="md:w-1/3 flex  justify-center items-center mt-7">
                                                @if ($hidden4 == 'hidden')
                                                    <x-jet-button class="{{ $hidden3 }}  flex justify-center items-center
                                                        rounded-full h-10 w-20 "
                                                        wire:click="saveDescripcionPlanificadas()"><i
                                                            class="text-4xl fas fa-plus"></i>
                                                    </x-jet-button>
                                                @endif
                                                @if ($hidden4 == '')
                                                    <x-jet-button wire:click="updatePlanificadas()" class=" {{ $hidden4 }}  flex justify-center items-center
                                                        rounded-full h-10 w-20"> <i
                                                            class="text-4xl fas fa-pen-square"></i>
                                                    </x-jet-button>
                                                @endif
                                            </div>


                                        </div>

                                        <div class="md:w-full px-3   mb-6">
                                            <textarea wire:model="descripcion_rubro_planificadas"
                                                class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                                rows="4"></textarea>
                                            @error('descripcion_rubro_planificadas') <span
                                                class="error text-red-700">{{ $message }}</span> @enderror
                                        </div>
                                    </div>



                                    <livewire:mini-table-planificadas />










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
                                    <x-jet-secondary-button wire:click="cerrarModal()" x-show="step < 2">Cerrar
                                        </x-jet-secundary-button>
                                        <button x-show="step < 2" wire:click="validador"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Siguiente</button>

                                        <x-jet-button x-show="step === 2" wire:click="save()">Guardar
                                            </x-jet-secundary-button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>


    @push('scripts')
        <script>
            const inputValue = document.getElementById("date");
            inputValue.addEventListener('change', () => {
                const valor = inputValue.value;
                flatpickr("#date1", {

                    dateFormat: "Y-m-d",
                    minDate: `'${valor}'`, //-7 dias
                    maxDate: "today",
                    locale: {
                        firstDayOfWeek: 1,
                        weekdays: {
                            shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                            longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes',
                                'Sábado'
                            ],
                        },
                        months: {
                            shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep',
                                'Оct', 'Nov', 'Dic'
                            ],
                            longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                                'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                            ],
                        },
                    }
                });


            });

            const fp = flatpickr("#date", {

                dateFormat: "Y-m-d",
                minDate: new Date().fp_incr(-30),
                maxDate: "today",
                //-7 dias
                /*  maxDate: (new Date().setFullYear((new Date()).getFullYear() - 18)), // hoy */
                locale: {
                    firstDayOfWeek: 1,
                    weekdays: {
                        shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                        longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    },
                    months: {
                        shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov',
                            'Dic'
                        ],
                        longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                    },

                }
            });



            const inputValue2 = document.getElementById("date2");
            inputValue2.addEventListener('change', () => {
                const valor2 = inputValue2.value;
                flatpickr("#date3", {

                    dateFormat: "Y-m-d",
                    minDate: `'${valor2}'`, //-7 dias
                    maxDate: new Date().fp_incr(+30),
                    locale: {
                        firstDayOfWeek: 1,
                        weekdays: {
                            shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                            longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes',
                                'Sábado'
                            ],
                        },
                        months: {
                            shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep',
                                'Оct', 'Nov', 'Dic'
                            ],
                            longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                                'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                            ],
                        },
                    }
                });


            });

            const fp2 = flatpickr("#date2", {

                dateFormat: "Y-m-d",
                maxDate: new Date().fp_incr(+30),
                minDate: "today",
                //-7 dias
                /*  maxDate: (new Date().setFullYear((new Date()).getFullYear() - 18)), // hoy */
                locale: {
                    firstDayOfWeek: 1,
                    weekdays: {
                        shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                        longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    },
                    months: {
                        shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov',
                            'Dic'
                        ],
                        longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                    },

                }
            });

        </script>
    @endpush
</div>
