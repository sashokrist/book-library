<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ auth()->user()->name }}'s {{ __('Books') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div
            style="background-color: #28a745; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div
            style="background-color: red; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <div class="mt-6">
                        <ul class="mt-2">
                            @forelse ($books as $book)
                                <li class="mt-1">
                                    <strong>{{ $book->name }}</strong><br>
                                    ISBN: {{ $book->isbn }}<br>
                                    Description: {{ $book->description }}<br>
                                    <!-- Remove Book Form -->
                                    <form action="{{ route('user-collections.remove', $book->id) }}" method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                            Remove from Collection
                                        </button>
                                    </form>
                                    <hr style="border: 1px solid white; width: 300px; margin-left: auto; margin-right: auto; margin-top: 10px;">
                                </li>
                            @empty
                                <p>You have no books in your collection.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
