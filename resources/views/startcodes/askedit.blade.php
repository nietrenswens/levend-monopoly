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
                    <h2 class="font-semibold text-xl text-center">Wijzig een startcode</h2>
                    <div class="w-4/6 mx-auto grid md:grid-cols-2 grid-cols-1 gap-2 mt-6 md:gap-6">
                        @foreach ($startcodes as $startcode)
                            <a class="p-6 text-white font-bold text-center bg-blue-400" href="{{ route('dashboard.startcodes.edit', compact('startcode')) }}">{{ $startcode->code }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
