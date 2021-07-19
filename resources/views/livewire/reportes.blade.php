

<div>

<div class="flex flex-col p-4">
    <div class="m-4 flex flex-row flex-wrap-reverse
    justify-evenly items-center">
        <div class="flex flex-col justify-evenly items-center p-4 md:p-4 ">
                <div class="p-4  md:p-4">
                    Seleccione el Docente
                </div>
                <div class="">
                    <select wire:model="Idusuario" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block   shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value='' selected>Selecione</option>
                                @foreach ($this->usuarios as $data )
                                <option value={{ $data->id }}>{{ $data->name }} {{ $data->lastname }}</option>
                            @endforeach
                    </select>
                </div>
        </div>
        <div class="p-8 md:p-4 w-52 ">
                <div class="widget w-full p-4 rounded-lg bg-white border-8 border-blue-300  dark:bg-gray-900 dark:border-gray-800">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Informes Generados
                            </div>
                            <div class="text-xl font-bold">
                                {{ $informes_generados }}
                            </div>
                        </div>
                        <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                            </path>
                            <circle cx="9" cy="7" r="4">
                            </circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                            </path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75">
                            </path>
                        </svg>
                    </div>
            </div>
        </div>
        <div class="p-8 md:p-4 w-52 ">
                <div class="widget w-full p-4 rounded-lg bg-white border-8 border-red-300  dark:bg-gray-900 dark:border-gray-800">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Horas Trabajadas
                            </div>
                            <div class="text-xl font-bold">
                                {{ $horas_trabajadas }}
                            </div>
                        </div>
                        <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                            </path>
                            <circle cx="9" cy="7" r="4">
                            </circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                            </path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75">
                            </path>
                        </svg>
                    </div>
            </div>
        </div>
        <div class="p-8 md:p-4 w-52 ">
                <div class="widget w-full p-4 rounded-lg bg-white border-8 border-yellow-300  dark:bg-gray-900 dark:border-gray-800">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Dias Habiles Sin Cortes
                            </div>
                            <div class="text-xl font-bold">
                                {{ round($dias_habiles) }}
                            </div>
                        </div>
                        <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                            </path>
                            <circle cx="9" cy="7" r="4">
                            </circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                            </path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75">
                            </path>
                        </svg>
                    </div>
            </div>
        </div>
        <div class="p-8 md:p-4 w-52">
                <div class="widget w-full p-4 rounded-lg bg-white border-8 border-green-300  dark:bg-gray-900 dark:border-gray-800">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                               Porcentaje Horas x mes habil
                            </div>
                            <div class="text-xl font-bold">
                                {{ round($horas_mes_habil) }}
                            </div>
                        </div>
                        <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                            </path>
                            <circle cx="9" cy="7" r="4">
                            </circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                            </path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75">
                            </path>
                        </svg>
                    </div>
            </div>
        </div>
    </div>
    <div class="md:w-11/12 md:flex bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class=" md:w-6/12" >
        <canvas id="myChart" width="600" height="600"></canvas>
        </div>
        <div class=" md:w-6/12" >
                GRAFICO DOS
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    let myChart;
    let nombres = [];
    let horas = [];

    var ctx = document.getElementById('myChart').getContext('2d');
    Livewire.on('DatosGraficos',(datos)=>{
        if (myChart) {
            nombres = [];
            horas = [];
            myChart.destroy();
            }
        datos.forEach((element,key) => {
          nombres[key] = element.nombre_rubro_realizadas;
          horas[key] = element.HorasTotales;
        });

        myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nombres,
            datasets: [{
                label: '# de Horas x Rubro',
                data: horas,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    });

    </script>
@endpush
