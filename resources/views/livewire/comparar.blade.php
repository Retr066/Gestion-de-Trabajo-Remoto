<div>

  <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg m-3">
      <div class="flex flex-col items-center">

          <div class="w-full md:w-1/2 flex flex-col items-center">
              <div class="w-full px-4">
                  <div class="flex flex-col items-center relative">
                      @if ($picked)
                          <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Seleccionado</span>
                      @else
                          <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Sin Seleccionar</span>
                      @endif
                      <div class="w-full">
                          <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                              <div class="flex flex-auto flex-wrap"></div>
                              <input wire:model="buscar" wire:keydown.enter="asignarPrimero()"
                                  placeholder="Buscar Docentes... "
                                  class="p-1 px-2 appearance-none outline-none w-full text-gray-800">

                              <div
                                  class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                  <button wire:click="restablecer()"
                                      class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                          viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12" />
                                      </svg>
                                  </button>
                              </div>
                          </div>
                      </div>
                      @error('buscar') <span class="error text-red-700">{{ $message }}</span>
                      @else
                          @if (count($usuarios) > 0)
                              @if (!$picked)
                                  <div
                                      class=" shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                                      <div class="flex flex-col w-full">
                                          @foreach ($usuarios as $usuario)
                                              <div
                                                  class="cursor-pointer w-full border-gray-100 border-b hover:bg-teal-100">
                                                  <div wire:click="asignarUsuario('{{ $usuario->name }} {{ $usuario->lastname }}',{{ $usuario->id }})"
                                                      class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                                      <div class="w-6 flex flex-col items-center">
                                                          @if ($usuario->profile_photo_path == null)
                                                              <div
                                                                  class="flex relative w-10 h-10 bg-orange-500 justify-center items-center m-1 mr-2  mt-1 rounded-full ">
                                                                  <img class="rounded-full"
                                                                      src="{{ $usuario->image_user }}"
                                                                      alt="{{ $usuario->name }} ">
                                                              </div>
                                                          @else
                                                              <div
                                                                  class="flex relative w-10 h-10 bg-orange-500 justify-center items-center m-1 mr-2  mt-1 rounded-full ">
                                                                  <img class="rounded-full" alt="{{ $usuario->name }}"
                                                                      src="{{ asset('storage/' . $usuario->profile_photo_path) }}">
                                                              </div>
                                                          @endif
                                                      </div>
                                                      <div class="w-full items-center flex">
                                                          <div class="mx-2 -mt-1  ">{{ $usuario->name }}
                                                              {{ $usuario->lastname }}
                                                              <div
                                                                  class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500">
                                                                  {{ $usuario->r_area->nombre_area }}</div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endforeach

                                      </div>
                                  </div>
                              @endif
                          @elseif ($buscar !== '' && count($usuarios) >= 0 )
                              <small class="form-text text-muted">Docente no encontrado</small>
                          @else
                              <small class="form-text text-muted">Comienza a buscar a los Docente (*)</small>

                          @endif
                      @enderror
                  </div>
              </div>
          </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Seleccione Actividades Planificadas
              </label>
              <select id="input4" wire:model="informe_planificado"
                  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                  <option value="" selected>Seleccione... </option>
                  @foreach ($this->informes as $informe)
                      <option value="{{ $informe->id }}">
                          {{ $informe->fecha_inicio_planificadas }}/{{ $informe->fecha_fin_planificadas }}
                          enviado:
                          {{ $informe->updated_at }}</option>
                  @endforeach
              </select>
              @error('informe_planificado') <span class="error text-red-700">{{ $message }}</span> @enderror
          </div>
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Seleccione Actividades Realizadas
              </label>
              <select wire:model="informe_realizado" id="input4"
                  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                  <option value="" selected>Seleccione... </option>
                  @foreach ($this->informes as $informe)
                      <option value="{{ $informe->id }}">
                          {{ $informe->fecha_inicio_realizadas }}/{{ $informe->fecha_fin_realizadas }} enviado:
                          {{ $informe->updated_at }}</option>
                  @endforeach
              </select>
              @error('informe_realizado') <span class="error text-red-700">{{ $message }}</span> @enderror
          </div>
      </div>
      <div class="flex justify-center"><button wire:click="generarComparacion()"
              class="cabeceratable p-2 border md:w-1/4 w-full rounded-md bg-gray-800 text-white">Generar
              Comparacion</button></div>
      @if (session()->has('message'))
          <div class="alert alert-danger bg-red-200 text-red-800 text-center">
              {{ session('message') }}
          </div>
      @endif
  </div>
  <!--Third  card-->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

      <!--desde aqui -->

      <div class="p-8 bg-white">
          <!--Banner image-->

          <!--Tag-->
          <p class="text-indigo-500 font-semibold text-base mt-2">{{ $nombre2 }}</p>

          <!--Title-->
          @foreach ($data_planificado as $planificado)
              <h1 class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate">
                  {{ $planificado->nombre_rubro_planificadas }}
              </h1>
              <!--Description-->
              <div class="max-w-full">
                  <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                      {{ $planificado->descripcion_rubro_planificadas }}
                  </p>
                  <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                      Horas empleadas en la actividad:{{ $planificado->horas_solas_planificas }}
                  </p>
              </div>
          @endforeach
          <div class="flex items-center space-x-2 mt-20">
              <!--Author's profile photo-->

              @foreach ($this->user as $user)
                  @if ($user->profile_photo_path == null)
                      <img class="w-10 h-10 object-cover object-center rounded-full" src="{{ $user->image_user }}"
                          alt="{{ $user->name }} " />
                  @else
                      <img class="w-10 h-10 object-cover object-center rounded-full" alt="{{ $user->name }}"
                          src="{{ asset('storage/' . $user->profile_photo_path) }}" />
                  @endif
                  <div>
                      <!--Author name-->
                      <p class="text-gray-900 font-semibold">{{ $user->name }} {{ $user->lastname }}</p>
                      <p class="text-gray-500 font-semibold text-sm">
                          Fecha {{ $fecha_envio_planificada }}; Horas Total:{{ $horas_planificadas }}
                      </p>
                  </div>
              @endforeach
          </div>
      </div>

      <!--segundo -->

      <div class="p-8 bg-white">

          <p class="text-indigo-500 font-semibold text-base mt-2">{{ $nombre }}</p>

          <!--Title-->
          @foreach ($data_realizado as $realizado)
              <h1 class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate">
                  {{ $realizado->nombre_rubro_realizadas }}
              </h1>
              <!--Description-->
              <div class="max-w-full">
                  <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                      {{ $realizado->descripcion_rubro_realizadas }}
                  </p>
                  <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                      Horas empleadas en la actividad:{{ $realizado->horas_solas_realizadas }}
                  </p>
              </div>
          @endforeach
          <div class="flex items-center space-x-2 mt-20">
              <!--Author's profile photo-->
              @foreach ($this->user as $user)
                  @if ($user->profile_photo_path == null)
                      <img class="w-10 h-10 object-cover object-center rounded-full" src="{{ $user->image_user }}"
                          alt="{{ $user->name }} " />
                  @else
                      <img class="w-10 h-10 object-cover object-center rounded-full" alt="{{ $user->name }}"
                          src="{{ asset('storage/' . $user->profile_photo_path) }}" />
                  @endif
                  <div>
                      <!--Author name-->
                      <p class="text-gray-900 font-semibold">{{ $user->name }} {{ $user->lastname }}</p>
                      <p class="text-gray-500 font-semibold text-sm">
                          Fecha {{ $fecha_envio_realizada }}; Horas Total:{{ $horas_realizas }}
                      </p>
                  </div>
              @endforeach
          </div>
      </div>

      <!--hasta aqui-->

  </div>
</div>
@push('styles')
  <style>
      .top-100 {
          top: 100%
      }
      .bottom-100 {
          bottom: 100%
      }
      .max-h-select {
          max-height: 300px;
      }
  </style>
@endpush