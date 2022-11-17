<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-4xl font-bold">Welkom '{{ Auth::user()->name }}' bij levendmonopoly</h2>
                    @if(Auth::user()->role == 'gebruiker')
                        <h2 class="text-3xl text-center pt-12">Statistieken</h2>
                        <div class="md:grid grid-cols-3 gap-x-8 pt-4">
                            <div class="text-center bg-lime-400 p-12 mb-8 md:mb-0 rounded-3xl text-white">
                                <h3 class="text-2xl pb-4 font-bold">Rang</h3>
                                <p class="text-4xl pb-4 font-bold">{{ Auth::user()->getRank() }}</p>
                                <p class="text-lg">Hoe goed (of slecht) ben je nou eigenlijk?</p>
                            </div>
                            <div class="text-center bg-blue-400 p-12 mb-8 md:mb-0 rounded-3xl text-white">
                                <h3 class="text-2xl pb-4 font-bold">Gebouwen</h3>
                                <p class="text-4xl pb-4 font-bold">{{ Auth::user()->numBuildings() }}</p>
                                <p class="text-lg">Ben je een echte kapitalist?</p>
                            </div>
                            <div class="text-center bg-red-400 p-12 rounded-3xl text-white">
                                <h3 class="text-2xl pb-4 font-bold">Kanskaarten gebruikt</h3>
                                <p class="text-4xl pb-4 font-bold">{{ Auth::user()->numChancecards() }}</p>
                                <p class="text-lg">Staat het geluk aan jou kant?</p>
                            </div>
                        </div>
                    @elseif(Auth::user()->role == 'admin' or Auth::user()->role == 'gamemaster')
                        <h2 class="text-3xl text-center pt-12">Statistieken</h2>
                        <div class="md:grid grid-cols-3 gap-x-8 pt-4">
                            <div class="text-center bg-lime-400 p-12 mb-8 md:mb-0 rounded-3xl text-white">
                                <h3 class="text-2xl pb-4 font-bold">Teams</h3>
                                <p class="text-4xl pb-4 font-bold">{{ $data[0] }}</p>
                                <p class="text-lg">Hoeveel spelers zijn er</p>
                            </div>
                            <div class="text-center bg-blue-400 p-12 mb-8 md:mb-0 rounded-3xl text-white">
                                <h3 class="text-2xl pb-4 font-bold">Gebouwen</h3>
                                <p class="text-4xl pb-4 font-bold">{{ $data[1] }}</p>
                                <p class="text-lg">Hoeveel gebouwen zijn er in het spel?</p>
                            </div>
                            <div class="text-center bg-red-400 p-12 rounded-3xl text-white">
                                <h3 class="text-2xl pb-4 font-bold">Kanskaarten gebruikt</h3>
                                <p class="text-4xl pb-4 font-bold">{{ $data[2] }}</p>
                                <p class="text-lg">Hoevaak testen spelers hun geluk?</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
