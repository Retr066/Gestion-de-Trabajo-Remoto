<div>
    <h2 class="text-center mt-8">INFORMES DE ACTIVIDADES PLANIFICADAS</h2>
    <div class=" md:flex justify-end content mr-8">
        <button
            class="w-50 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium "
            :class="{ 'active': tab === 'foo' }" @click="tab = 'foo'"><i
                class="fas fa-arrow-circle-left mr-2"></i>Realizadas</button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:informe-table-planificadas />
            </div>
        </div>
    </div>

</div>

</div>
