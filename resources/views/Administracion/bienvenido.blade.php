<x-app-layout>
    <h1 class="text-center mt-8">Bienvenido Usuario {{ Auth::user()->name }}</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                No tienes permisos , porfavor comunicarse con el area de Administracion
            </div>
        </div>
    </div>


</x-app-layout>
