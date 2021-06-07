<div>
    <form wire:submit.prevent='{{ $method }}'>
        <x-component-modal :showModal="$showModal" :action="$action">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    {{ $nombreModal }}
                </h3>
                <div class="mt-2">
                    <div class="flex">
                        <x-component-input placeholder=" Ingrese su Nombre" name="name" label="Nombres">
                        </x-component-input>
                        <x-component-input placeholder=" Ingrese su Apellido" name="lastname" label="Apellidos">
                        </x-component-input>
                    </div>
                    <div class="flex">
                        <x-component-input placeholder=" Ingrese su Area" name="nombre_area" label="Area">
                        </x-component-input>
                       {{--  <x-component-input-select name="role" label="Rol"
                            :options="['docente' =>'Docente','jefatura'=> 'Jefe','administracion'=> 'Administracion']">
                        </x-component-input-select> --}}
                        <x-component-input-select name="role" label="Rol"
                        :options="$roles">
                    </x-component-input-select>
                    </div>
                    <div class="flex">
                        <x-component-input placeholder=" Ingrese su Correo" name="email" label="Correo">
                        </x-component-input>
                    </div>
                    <div class="flex">
                        <x-component-input placeholder=" Ingrese su Imagen Retr0"  name="profile_photo_path" label="Imagen"
                             type="file" >
                        </x-component-input>

                     </div>

                    @if ($action == 'Registrar')
                        <div class="flex">
                            <x-component-input placeholder=" Ingrese su clave" name="password" label="Clave"
                                type="password">
                            </x-component-input>
                            <x-component-input placeholder=" Confirme de clave" name="password_confirmation"
                                 type="password" label="Confirmacion de clave">
                            </x-component-input>
                        </div>
                    @endif
                </div>
            </div>
        </x-component-modal>
    </form>

</div>
