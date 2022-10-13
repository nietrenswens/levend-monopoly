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
                    {{-- {{ route('dashboard.users.update', ['user' => $user->id]) }} --}}
                    <form action="{{ route('dashboard.users.update', compact('user')) }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Gebruikersnaam</label>
                            <input name="user_naam" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ $user->name }}">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Wachtwoord</label>
                            <input name="user_wachtwoord" type="password" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            {{-- <input name="user_email" type="email" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ $user->email }}"> --}}
                            <select name="user_role" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                                <option value="gebruiker" @if ($user->role == 'gebruiker') selected @endif>Team</option>
                                <option value="spelleider" @if ($user->role == 'gamemaster') selected @endif>Spelleider</option>
                            </select>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">wijzig</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
