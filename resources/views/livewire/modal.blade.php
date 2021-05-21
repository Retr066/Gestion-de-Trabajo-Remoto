<div>


    <x-jet-dialog-modal wire:model="open" >

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

                <div x-data="app()" x-cloak>
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
                                                type="text" value="{{ Auth::user()->r_area->nombre_area  }}" readonly>
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
                                                 type="text"  value="{{ Auth::user()->email }}" readonly>
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
                                                 type="text"  value="{{ Auth::user()->lastname }}" readonly>
                                            <!--  <p class="text-red text-xs italic">Porfavor Rellena Este Campo.</p> -->
                                        </div>
                                    </div>
                                    <div class="-mx-3 md:flex mb-7">
                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"

                                                for="grid-city">
                                                Fecha Inicio
                                            </label>
                                            <input
                                             wire:model="fecha_inicio_realizadas"
                                             type="date"
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 "
                                                id="grid-city"  placeholder="dd/mm/aa" autocomplete="off">
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label

                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-zip">
                                                Fecha Fin
                                            </label>
                                            <input
                                            type="date"
                                            wire:model="fecha_fin_realizadas"
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4  "
                                                id="grid-zip"  placeholder="dd/mm/aa" autocomplete="off">
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
                                                <select
                                                    class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                                    id="grid-state">
                                                    @foreach($rubros as $rubro)
                                                    <option>{{ $rubro->nombre_rubro }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                            <div class="md:w-2/5  px-5 flex flex-col justify-center items-start">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-zip">
                                                    Horas Dedicadas </label>
                                                <!-- Contador -->
                                                <input
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                    id="grid-city" type="number" value="0" placeholder="0">

                                            </div>
                                            <div class="md:w-1/3 flex  justify-center items-center mt-7">
                                                <x-jet-button class="flex justify-center items-center
                                                            rounded-full h-10 w-20"><i
                                                        class="text-4xl fas fa-plus"></i></x-jet-button>

                                            </div>


                                        </div>

                                        <div class="md:w-full px-3  md:flex mb-6">
                                            <textarea
                                                class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                                rows="4"></textarea>
                                        </div>
                                    </div>



                                    <table
                                        class="table-auto md:w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                                        <tr class="text-left border-b-2 border-gray-300">
                                            <th class="px-4 py-3">ID</th>
                                            <th class="px-4 py-3">Informe Asociado</th>
                                            <th class="px-4 py-3">Rubro</th>
                                            <th class="px-4 py-3">Descripcion</th>
                                            <th class="px-4 py-3">Horas</th>
                                            <th class="px-4 py-3">Acciones</th>
                                        </tr>
                                        @foreach ($informesRealizadas as  $informesRealizada)


                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <td class="px-4 py-3">{{ $informesRealizada->id }}</td>
                                            <td class="px-4 py-3">{{ $informesRealizada->id_informe_realizadas }}</td>
                                            <td class="px-4 py-3">{{ $informesRealizada->nombre_rubro_realizadas }}</td>
                                            <td class="px-4 py-3">{{ $informesRealizada->descripcion_rubro_realizadas }}</td>
                                            <td class="px-4 py-3">{{ $informesRealizada->horas_solas_realizadas }}</td>
                                            <td class="px-4 py-3">
                                                <button
                                                    class="text-yellow-400 hover:text-yellow-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button
                                                    class="text-red-400 hover:text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </table>
                                    <div class="-mx-3 md:flex  justify-end items-end">
                                        <div class='md:w-2/5  px-5 md:flex flex-col justify-center items-center'>
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-zip">
                                                Horas Totales </label>
                                            <!-- Contador -->
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                id="grid-city" type="number" value="0" placeholder="0" readonly>
                                        </div>

                                    </div>



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
                                                value="{{ Auth::user()->r_area->nombre_area }}" type="text" placeholder="Ingenieria de Sistemas" readonly>
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
                                                 type="text"  value="{{ Auth::user()->email }}" readonly>
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
                                                 type="text"  value="{{ Auth::user()->lastname }}" readonly>
                                            <!--  <p class="text-red text-xs italic">Porfavor Rellena Este Campo.</p> -->
                                        </div>
                                    </div>
                                    <div class="-mx-3 md:flex mb-7">
                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                            <label

                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-city">
                                                Fecha Inicio
                                            </label>
                                            <input
                                            type="date"
                                            wire:model="fecha_inicio_planificadas"
                                                class="appearance-none  block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4  "
                                                id="grid-city"  placeholder="dd/mm/aa" autocomplete="off">
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-zip">
                                                Fecha Fin
                                            </label>
                                            <input
                                            type="date"
                                            wire:model="fecha_fin_planificadas"
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4  "
                                                id="grid-zip "    placeholder="dd/mm/aa" autocomplete="off">
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
                                                <select
                                                    class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                                    id="grid-state">

                                                    @foreach($rubros as $key =>$rubro)
                                                    <option value=''>{{ $rubro->nombre_rubro }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="md:w-2/5  px-5 flex flex-col justify-center items-start">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-zip">
                                                    Horas Dedicadas </label>
                                                <!-- Contador -->
                                                <input
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                    id="grid-city" type="number" value="0" placeholder="0">

                                            </div>
                                            <div class="md:w-1/3 flex  justify-center items-center mt-7">
                                                <x-jet-button class="flex justify-center items-center
                                                        rounded-full h-10 w-20 " wire:click="listRubro()"><i class="text-4xl fas fa-plus"></i>
                                                </x-jet-button>

                                            </div>


                                        </div>

                                        <div class="md:w-full px-3  md:flex mb-6">
                                            <textarea
                                                class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                                rows="4"></textarea>
                                        </div>
                                    </div>



                                    <table
                                        class="table-auto md:w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                                        <tr class="text-left border-b-2 border-gray-300">
                                            <th class="px-4 py-3">ID</th>
                                            <th class="px-4 py-3">Informe Asociado</th>
                                            <th class="px-4 py-3">Rubro</th>
                                            <th class="px-4 py-3">Descripcion</th>
                                            <th class="px-4 py-3">Horas</th>
                                            <th class="px-4 py-3">Acciones</th>
                                        </tr>
                                        @foreach ($informesPlanificadas as  $informesPlanificada)
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <td class="px-4 py-3">{{ $informesPlanificada->id }}</td>
                                            <td class="px-4 py-3">{{ $informesPlanificada->id_informe_planificadas }}</td>
                                            <td class="px-4 py-3">{{ $informesPlanificada->nombre_rubro_planificadas }}</td>
                                            <td class="px-4 py-3">{{ $informesPlanificada->descripcion_rubro_planificadas }}</td>
                                            <td class="px-4 py-3">{{ $informesPlanificada->horas_solas_planificas }}</td>
                                            <td class="px-4 py-3">
                                                <button
                                                    class="text-yellow-400 hover:text-yellow-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button
                                                    class="text-red-400 hover:text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </table>
                                    <div class="-mx-3 md:flex  justify-end items-end">
                                        <div class='md:w-2/5  px-5 md:flex flex-col justify-center items-center'>
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-zip">
                                                Horas Totales </label>
                                            <!-- Contador -->
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                id="grid-city" type="number" value="0" placeholder="0" readonly>
                                        </div>

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
                                    <x-jet-secondary-button wire:click="cerrarModal()" x-show="step < 2">Cerrar
                                        </x-jet-secundary-button>
                                        <button x-show="step < 2" @click="step++"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Siguiente</button>

                                        <x-jet-button x-show="step === 2" wire:click="save()"  @click="reset()">Guardar</x-jet-secundary-button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
                </div>

                <script>
                    function app() {
                        return {
                            step: 1,
                            reset(){
                                setTimeout(() => {
                                    this.step--
                                }, 800);
                            },
                        }
                    }

                    function reset() {
                        setTimeout(() => {
                            step--
                        }, 500);
                    }

                    const fp = flatpickr(".date", {
                        "plugins": [new rangePlugin({ input: ".date1"})],
                        "locale": "es",
                        dateFormat: "Y-m-d",
                        minDate: new Date().fp_incr(-7), //-7 dias
                        maxDate: "today" // hoy

                    });
                    const fp1 = flatpickr(".date1", {
                        "locale": "es",
                        dateFormat: "Y-m-d",
                        minDate: new Date().fp_incr(-7), //-7 dias
                        maxDate: "today" // hoy

                    });
                    //PLANIFICADAS
                    const fp2 = flatpickr(".date2", {
                        "plugins": [new rangePlugin({ input: ".date3"})],
                        "locale": "es",
                        dateFormat: "Y-m-d",
                        minDate: "today", // hoy
                        maxDate: new Date().fp_incr(7) // +7 dias

                    });
                    const fp3 = flatpickr(".date3", {
                        "locale": "es",
                        dateFormat: "Y-m-d",
                        minDate: "today", // hoy
                        maxDate: new Date().fp_incr(7) // +7 dias

                    });

                </script>

        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>

</div>
