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
                    <h2 class="text-2xl font-bold">Welkom '{{ Auth::user()->name }}' bij levendmonopoly</h2>
                    <h3 class="text-lg">Hoe werkt het?</h3>
                    <p>In het speelveld hangen er blaadjes met fotos en prijzen van gebouwen met een qr-code. Als je interesse hebt in dit gebouw kan je deze kopen door de qr-code te scannen.
                        Als het gebouw al gekocht, moet je huur betalen. De huur bedraagt 40% van de koopprijs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
