<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                    <form action="{{ route('dashboard.startcodes.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Code</label>
                            <input name="startcode_code" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Waarde</label>
                            <input name="startcode_amount" type="number" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Maak aan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
