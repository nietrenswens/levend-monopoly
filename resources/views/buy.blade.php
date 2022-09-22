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
                </div>
                <div class="w-4/6 mx-auto grid grid-cols-2 gap-6">
                    <a class="p-6 text-white font-bold text-center bg-red-400" href="#">Nee</a>
                    <a class="p-6 text-white font-bold text-center bg-green-400" href="#">Ja</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
