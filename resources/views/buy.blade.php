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
                    <h2 class="font-semibold text-xl text-center">Weet je zeker dat je {{ $gebouw->naam }} wilt kopen?</h2>
                    <div class="text-center">
                        <h3 class="text-gray-500">Prijs(excl. BTW): &euro;{{ $gebouw->prijs }}</h3>
                        <h3 class="text-gray-500">Prijs(incl. BTW): &euro;{{ $gebouw->prijs * 1.21}}</h3>
                    </div>
                </div>
                <div class="w-4/6 mx-auto grid md:grid-cols-2 grid-cols-1 gap-2 md:gap-6">
                    <a class="p-6 text-white font-bold text-center bg-red-400" href="{{ route('dashboard.index') }}">Nee</a>
                    <a class="p-6 text-white font-bold text-center bg-green-400" href="{{ route('buybuilding', ['uuid' => $gebouw->uuid, 'belasting' => false])}}">Ja (excl. btw)</a>
                    <a class="p-6 text-white font-bold text-center bg-blue-400" href="{{ route('buybuilding', ['uuid' => $gebouw->uuid, 'belasting' => true])}}">Ja (incl. btw)</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
