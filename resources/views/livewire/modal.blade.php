<div>

    <x-jet-button wire:click="$set('open',true)">Crear un Nuevo Informe</x-jet-button>
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Nuevo Informe
        </x-slot>
        <x-slot name="content"  >
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
                                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    Area
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                                    id="grid-first-name" type="text" placeholder="Ingenieria de Sistemas">
                                                <!-- <p class="text-red text-xs italic">Porfavor Rellena Este Campo</p> -->
                                            </div>
                                            <div class="md:w-1/2 px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-last-name">
                                                    Nombre Completo
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                    id="grid-last-name" type="text" placeholder="Sulca">
                                                   <!--  <p class="text-red text-xs italic">Porfavor Rellena Este Campo.</p> -->
                                            </div>
                                        </div>
                                        <div class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-correo">
                                                     Correo Electronico
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                                    id="grid-correo" type="text" placeholder="example@gmail.com">
                                               <!--  <p class="text-grey-dark text-xs italic">Porfavor Rellena Este Campo.</p> -->
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
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                    id="grid-city" type="date" placeholder="dd/mm/aa">
                                            </div>
                                            <div class="md:w-1/2 px-3">
                                                <label
                                                    class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                    for="grid-zip">
                                                    Fecha Fin
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                    id="grid-zip" type="date" placeholder="dd/mm/aa">
                                            </div>
                                        </div>
                                        <!-- TABLA  -->
                                        <div class = "-mx-3 md:flex mb-3     flex-col justify-center items-around">
                                                    <div class = "md:w-full px-3  md:flex mb-6  flex-row justify-around items-center">
                                                        <div class=" md:w-2/5   flex flex-col justify-center items-start">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                            for="grid-zip">
                                                            Rubro               </label>
                                                            <!-- rubro seleccionar -->
                                                            <select
                                                            class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                                            id="grid-state">
                                                            <option>Investigacion</option>
                                                            <option>Dictado de Clases</option>
                                                            </select>
                                                        </div>
                                                        <div class="md:w-2/5  px-5 flex flex-col justify-center items-start" >
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                            for="grid-zip">
                                                            Horas Dedicadas          </label>
                                                        <!-- Contador -->
                                                            <input
                                                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                    id="grid-city" type="number"
                                                    value="0" placeholder="0">

                                                        </div>
                                                        <div class="md:w-1/3 flex  justify-center items-center mt-7">
                                                            <x-jet-button class="flex justify-center items-center
                                                            rounded-full h-10 w-20">+</x-jet-button>

                                                        </div>


                                                    </div>

                                            <div class="md:w-full px-3  md:flex mb-6">
                                            <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>
                                            </div>
                                        </div>



                                        <table class="table-auto md:w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                                          <tr class="text-left border-b-2 border-gray-300">
                                            <th class="px-4 py-3">ID</th>
                                            <th class="px-4 py-3">Informe Asociado</th>
                                            <th class="px-4 py-3">Rubro</th>
                                            <th class="px-4 py-3">Descripcion</th>
                                            <th class="px-4 py-3">Horas</th>
                                            <th class="px-4 py-3">Acciones</th>
                                          </tr>

                                          <tr class="bg-gray-100 border-b border-gray-200">
                                            <td class="px-4 py-3">Jill</td>
                                            <td class="px-4 py-3">Smith</td>
                                            <td class="px-4 py-3">50</td>
                                            <td class="px-4 py-3">Male</td>
                                            <td class="px-4 py-3">50</td>
                                            <td class="px-4 py-3">Male</td>
                                          </tr>


                                        </table>
                                        <div class="-mx-3 md:flex  justify-end items-end" >
                                        <div class='md:w-2/5  px-5 md:flex flex-col justify-center items-center'>
                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-zip">
                                                Horas Totales   </label>
                                            <!-- Contador -->
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                id="grid-city" type="number"
                                                value="0" placeholder="0" readonly>
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
                                                id="grid-first-name" type="text" placeholder="Ingenieria de Sistemas">
                                            <!-- <p class="text-red text-xs italic">Porfavor Rellena Este Campo</p> -->
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-last-name">
                                                Nombre Completo
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                id="grid-last-name" type="text" placeholder="Sulca">
                                               <!--  <p class="text-red text-xs italic">Porfavor Rellena Este Campo.</p> -->
                                        </div>
                                    </div>
                                    <div class="-mx-3 md:flex mb-6">
                                        <div class="md:w-full px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-correo">
                                                 Correo Electronico
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
                                                id="grid-correo" type="text" placeholder="example@gmail.com">
                                           <!--  <p class="text-grey-dark text-xs italic">Porfavor Rellena Este Campo.</p> -->
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
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                id="grid-city" type="date" placeholder="dd/mm/aa">
                                        </div>
                                        <div class="md:w-1/2 px-3">
                                            <label
                                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                for="grid-zip">
                                                Fecha Fin
                                            </label>
                                            <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                id="grid-zip" type="date" placeholder="dd/mm/aa">
                                        </div>
                                    </div>
                                    <!-- TABLA  -->
                                    <div class = "-mx-3 md:flex mb-3     flex-col justify-center items-around">
                                                <div class = "md:w-full px-3  md:flex mb-6  flex-row justify-around items-center">
                                                    <div class=" md:w-2/5   flex flex-col justify-center items-start">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                        for="grid-zip">
                                                        Rubro               </label>
                                                        <!-- rubro seleccionar -->
                                                        <select
                                                        class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                                        id="grid-state">
                                                        <option>Investigacion</option>
                                                        <option>Dictado de Clases</option>
                                                        </select>
                                                    </div>
                                                    <div class="md:w-2/5  px-5 flex flex-col justify-center items-start" >
                                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                                        for="grid-zip">
                                                        Horas Dedicadas          </label>
                                                    <!-- Contador -->
                                                        <input
                                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                                id="grid-city" type="number"
                                                value="0" placeholder="0">

                                                    </div>
                                                    <div class="md:w-1/3 flex  justify-center items-center mt-7">
                                                        <x-jet-button class="flex justify-center items-center
                                                        rounded-full h-10 w-20">+</x-jet-button>

                                                    </div>


                                                </div>

                                        <div class="md:w-full px-3  md:flex mb-6">
                                        <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"></textarea>
                                        </div>
                                    </div>



                                    <table class="table-auto md:w-full rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                                      <tr class="text-left border-b-2 border-gray-300">
                                        <th class="px-4 py-3">ID</th>
                                        <th class="px-4 py-3">Informe Asociado</th>
                                        <th class="px-4 py-3">Rubro</th>
                                        <th class="px-4 py-3">Descripcion</th>
                                        <th class="px-4 py-3">Horas</th>
                                        <th class="px-4 py-3">Acciones</th>
                                      </tr>

                                      <tr class="bg-gray-100 border-b border-gray-200">
                                        <td class="px-4 py-3">Jill</td>
                                        <td class="px-4 py-3">Smith</td>
                                        <td class="px-4 py-3">50</td>
                                        <td class="px-4 py-3">Male</td>
                                        <td class="px-4 py-3">50</td>
                                        <td class="px-4 py-3">Male</td>
                                      </tr>


                                    </table>
                                    <div class="-mx-3 md:flex  justify-end items-end" >
                                    <div class='md:w-2/5  px-5 md:flex flex-col justify-center items-center'>
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                            for="grid-zip">
                                            Horas Totales   </label>
                                        <!-- Contador -->
                                        <input
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                            id="grid-city" type="number"
                                            value="0" placeholder="0" readonly>
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
                                    <x-jet-secondary-button wire:click="$set('open',false)" x-show="step < 2">Cerrar</x-jet-secundary-button>
                                    <button x-show="step < 2" @click="step++"
                                        class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Siguiente</button>

                                   <x-jet-button  x-show="step === 2" >Guardar</x-jet-secundary-button>
                                    {{-- <button @click="step" x-show="step === 2"
                                        class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Completado</button> --}}
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
        }
    }

</script>

        </x-slot>
        <x-slot name="footer">







            {{-- <x-jet-secondary-button wire:click="$set('open',false)">Cerrar</x-jet-secundary-button>
                <x-jet-button>Guardar</x-jet-secundary-button> --}}

        </x-slot>
    </x-jet-dialog-modal>

</div>
