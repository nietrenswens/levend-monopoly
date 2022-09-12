<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 space-x-4 ">
                        <div class="bg-blue-400 text-center h-32 text-white font-bold text-xl">
                            Voeg een team toe
                        </div>
                        <div class="flex items-center bg-red-400 text-center h-32 text-white font-bold text-xl">
                            Verwijder een team
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
