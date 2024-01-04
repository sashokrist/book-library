<x-app-layout>
    @if(session('success'))
        <div style="background-color: #28a745; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Create Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <form action="{{ route('books.store') }}" method="POST" class="w-full max-w-xl mx-auto">
                        @csrf

                        {{-- Name Field --}}
                        <div class="mb-4">
                            <label for="name" class="block text-white-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        {{-- ISBN Field --}}
                        <div class="mb-4">
                            <label for="isbn" class="block text-white-700 text-sm font-bold mb-2">ISBN:</label>
                            <input type="text" id="isbn" name="isbn" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        {{-- Description Field --}}
                        <div class="mb-4">
                            <label for="description" class="block text-white-700 text-sm font-bold mb-2">Description:</label>
                            <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                        </div>

                        {{-- Users Dropdown --}}
{{--                        <div class="mb-4">--}}
{{--                            <label for="user_id" class="block text-white-700 text-sm font-bold mb-2">User Collection:</label>--}}
{{--                            <select id="user_id" name="user_id" class="block text-gray-700 appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">--}}
{{--                                @foreach($users as $user)--}}
{{--                                    <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

                        {{-- Submit Button --}}
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Add Book
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
