<x-app-layout>

    <div class="py-12 px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mx-3 my-3">
                    <div class="md:w-full md:flex lg:flex xl:flex 2xl:flex overflow-hidden shadow-xl sm:rounded-lg " style="background-color: #b3c6ff ;">
                        <div class="md:p-4 md:w-6/12 lg:w-6/12 xl:w-6/12 2xl:w-6/12">
                            @livewire("chat-form")
                        </div>
                        <div class="md:p-4 md:w-6/12 lg:w-6/12 xl:w-6/12 2xl:w-6/12 md:block lg:block xl:block 2xl:block " style="overflow: auto; height: 440px;" >
                            @livewire("chat-list")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
