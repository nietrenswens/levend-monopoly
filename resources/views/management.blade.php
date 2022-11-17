<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Management
        </h2>
    </x-slot>

    @if (Session::get('error'))
        <div class="md:w-2/6 w-full text-white mx-auto mt-2 bg-red-400 p-6">{{ Session::get('error') }}</div>
    @endif

    @if (Session::get('success'))
        <div class="md:w-2/6 w-full text-white mx-auto mt-2 bg-green-400 p-6">{{ Session::get('success') }}</div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid sm:grid-cols-3 grid-cols-1 gap-y-4 sm:gap-x-8 text-center">

                        <a class="bg-blue-400 p-8 sm:block sm:w-full text-white font-semibold text-lg" href="{{ route('dashboard.users.create') }}"><i class="fa fa-users"></i> Voeg een team toe</a>
                        <a class="bg-red-400 p-8 sm:block text-white font-semibold text-lg" href="{{ route('dashboard.users.delete') }}"><i class="fa fa-users"></i> Verwijder een team</a>
                        <a class="bg-green-400 p-8 sm:block text-white font-semibold text-lg" href="{{ route('dashboard.users.askedit') }}"><i class="fa fa-users"></i> Wijzig een team</a>

                        <a class="bg-blue-400 p-8 sm:w-full text-white font-semibold text-lg" href="{{ route('dashboard.gebouwen.create') }}" href="#"><i class="fa fa-home"></i> Voeg een gebouw toe</a>
                        <a class="bg-red-400 p-8 sm:w-full text-white font-semibold text-lg" href="{{ route('dashboard.gebouwen.delete') }}"><i class="fa fa-home"></i> Verwijder een gebouw</a>
                        <a class="bg-green-400 p-8 sm:w-full text-white font-semibold text-lg" href="{{ route('dashboard.gebouwen.askedit') }}"><i class="fa fa-home"></i> Wijzig een gebouw</a>

                        <a class="bg-blue-400 p-8 sm:w-full text-white font-semibold text-lg" href="{{ route('dashboard.startcodes.create') }}" href="#"><i class="fa fa-play"></i> Voeg een startcode toe</a>
                        <a class="bg-red-400 p-8 sm:w-full text-white font-semibold text-lg" href="{{ route('dashboard.startcodes.delete') }}"><i class="fa fa-play"></i> Verwijder een startcode</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
