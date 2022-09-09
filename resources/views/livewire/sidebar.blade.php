<div>
    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
        <div @click.away="open = false" style="background-color: #1D2435 !important;"
            class="flex flex-col w-full md:w-64 text-white bg-white dark-mode:text-white-200 dark-mode:bg-gray-800 flex-shrink-0"
            x-data="{ open: false }">
            <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                @foreach ($rol_user as $rol)
                    <a href="javascript:void(0)"
                        class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">{{ $rol }}</a>
                @endforeach
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <nav :class="{'block': open, 'hidden': !open}"
                class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                <div class="flex-shrink-0 px-5 py-4 flex flex-col items-center justify-between space-y-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="md:flex  "><img
                                class="  ring-4 ring-white rounded-full h-50 w-50 flex items-center justify-center..."
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        </div>
                    @endif
                    <div class="flex flex-col  ring-4 ring-white p-3 justify-center items-center">
                        <div class="md:flex  break-words text-sm font-semibold text-white  ">Bienvenido:</div>
                        <div class="md:flex  break-words text-sm font-semibold text-white ">
                            {{ Auth::user()->name }} {{ Auth::user()->lastname }}</div>
                        <div class="md:flex break-words text-sm font-semibold text-white   ">Usuario:</div>
                        <div class="md:flex break-words text-sm font-semibold text-white ">
                            {{ Auth::user()->email }}</div>
                        <div class="md:flex break-words  text-sm font-semibold text-white   ">Area: </div>
                        <div class="md:flex break-words  text-sm font-semibold text-white ">
                            {{ Auth::user()->r_area->nombre_area }}</div>
                    </div>
                </div>
                @if (canView('Docente'))
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('informes') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-green-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                    </svg>Informes Registrados</a>
                @endif
                @if (canView('Docente'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('informesRechazados') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg> Informes Rechazados</a>
                @endif
                @if (canView('Docente'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('reportesdocente') }}" ><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                    </svg>Reportes</a>
                @endif
                @if (canView('Docente'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('listDocente') }}" ><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>Permisos Docentes</a>
                @endif

                @if (canView('Jefatura'))
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('comparar') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L5 10.274zm10 0l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L15 10.274z" clip-rule="evenodd" />
                    </svg>Comparar</a>
                @endif

                @if (canView('Jefatura'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('informesJefatura') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-green-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>Informes Jefatura</a>
                @endif

                @if (canView('Jefatura'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('reportesjefatura') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                    </svg>Reportes</a>
                @endif

                @if (canView('Jefatura'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('listJefatura') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>Permisos Jefatura</a>
                @endif
                @if (canView('Docente'))
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('chat_docente') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                      </svg>Chat</a>
                @elseif (canView('Jefatura'))
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    href="{{ route('chat_jefatura') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                      </svg>Chat</a>
                @endif
                {{-- rutas para administracion --}}
                @if (canView('Administracion'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('informesAdministracion') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                    <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>Informes Administración</a>
                @endif
                @if (canView('Administracion'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('reportesadministracion') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                    </svg>Reportes</a>
                @endif

                @if (canView('Administracion'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('listAdministracion') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2  inline-block text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>Permisos Administracion</a>
                @endif
                @if (canView('Administracion'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('prueba') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block text-pink-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.625 2.655A9 9 0 0119 11a1 1 0 11-2 0 7 7 0 00-9.625-6.492 1 1 0 11-.75-1.853zM4.662 4.959A1 1 0 014.75 6.37 6.97 6.97 0 003 11a1 1 0 11-2 0 8.97 8.97 0 012.25-5.953 1 1 0 011.412-.088z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M5 11a5 5 0 1110 0 1 1 0 11-2 0 3 3 0 10-6 0c0 1.677-.345 3.276-.968 4.729a1 1 0 11-1.838-.789A9.964 9.964 0 005 11zm8.921 2.012a1 1 0 01.831 1.145 19.86 19.86 0 01-.545 2.436 1 1 0 11-1.92-.558c.207-.713.371-1.445.49-2.192a1 1 0 011.144-.83z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M10 10a1 1 0 011 1c0 2.236-.46 4.368-1.29 6.304a1 1 0 01-1.838-.789A13.952 13.952 0 009 11a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>Gestionar Usuarios</a>
                @endif
                @if (canView('Administracion'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('rubro') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block text-pink-500" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>Gestionar Rubros</a>
                @endif
                @if (canView('Administracion'))
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ route('permisos') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                </svg>Roles y Permisos</a>
                @endif
            </nav>
        </div>
    </div>
</div>