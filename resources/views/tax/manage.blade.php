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
                    <form action="{{ route('dashboard.tax.take') }}" method="POST">
                        @csrf
                        <label for="gebouw_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kies een gebouw</label>
                        <select id="gebouw_id" name="gebouw_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-6">
                            <option selected>Kies een gebouw</option>
                            @if ($gebouwen->count() == 0)
                                <option disabled>Er zijn nog geen gebouwen</option>
                            @endif
                            @foreach ($gebouwen as $gebouw)
                                <option value="{{ $gebouw->id }}">{{ $gebouw->naam }} - &euro;{{ $gebouw->prijs }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Innemen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
