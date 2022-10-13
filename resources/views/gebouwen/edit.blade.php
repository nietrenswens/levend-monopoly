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
                    <form action="{{ route('dashboard.gebouwen.update', compact('gebouw')) }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Naam</label>
                            <input name="gebouw_name" type="text" id="base-input"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                   value="{{ $gebouw->naam }}">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Prijs</label>
                            <input name="gebouw_price" type="text" id="base-input"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                   value="{{ $gebouw->prijs }}">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">UUID</label>
                            <input name="gebouw_uuid" type="text" id="base-input"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                   value="{{ $gebouw->uuid }}">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Belasting</label>
                            @if ($gebouw->belasting == 1)
                                <input name="gebouw_belasting" type="checkbox" id="base-input"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                       focus:ring-blue-500 focus:border-blue-500 block p-2.5 "
                                       value="on" checked>
                            @else
                                <input name="gebouw_belasting" type="checkbox" id="base-input"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                       focus:ring-blue-500 focus:border-blue-500 block p-2.5 "
                                       value="on">
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Eigenaar</label>
                            <select name="gebouw_owner_id" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($user->id == $gebouw->user_id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            wijzig
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
