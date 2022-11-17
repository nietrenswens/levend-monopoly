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
                    <h2 class="font-semibold text-xl text-center">{{$card->description}}</h2>
                    <div class="text-center">
                        @if($card->amount >= 0)
                            <h2 class="text-gray-500">{{$user->name}} heeft {{$card->amount}} ontvangen!</h2>
                        @else
                            <h2 class="text-gray-500">{{$user->name}} heeft {{-$card->amount}} betaald!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
