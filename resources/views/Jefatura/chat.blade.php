<x-app-layout>

    <div class="py-12 px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mx-3 my-3">
                    <div class="md:w-full md:flex bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="md:p-2 md:w-6/12">
                            @livewire("chat-form")
                        </div>
                        <div class="md:p-2 md:w-6/12">
                            @livewire("chat-list")
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


</x-app-layout>
