<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Overview
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div class="overflow-x-auto relative">
                        <h2 class="text-lg pb-4">Gebouwen</h2>
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Naam
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Prijs
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Eigenaar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gebouwen as $gebouw)
                                    <tr class="bg-white border-b">
                                        <th scope="row" class="py-4 px-6">
                                            {{ $gebouw->naam }}
                                        </th>
                                        <td class="py-4 px-6">
                                            &euro; {{ $gebouw->prijs }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @if(!is_null($gebouw->user))
                                                {{ $gebouw->user->name }}
                                            @else
                                                <span class="text-red-400">Geen eigenaar</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
