<x-app-layout>
    <h1 class="mt-8 text-center">Bienvenido Usuario {{ Auth::user()->name }}</h1>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                No tienes permisos , porfavor comunicarse con el area de Administracion
            </div>
        </div>
    </div>
</x-app-layout>
