<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ auth()->user()->name }}'s {{ __('Search for Books') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div style="background-color: #28a745; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('success'))
        <div style="background-color: #28a745; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <div class="mt-6">
                        <ul class="mt-2">
                            @foreach($books as $book)
                                <li class="mt-1">
                                    Name: <strong>{{ $book->name }}</strong><br>
                                    ISBN: <strong>{{ $book->isbn }}</strong> <br>
                                    Description: <trong>{{ $book->description }}</trong> <br>
                                    @if(auth()->user() && auth()->user()->isAdmin)
                                        <!-- Admin Action Buttons -->
                                        <div class="mt-2 flex items-center justify-center mb-5">
                                            <form action="{{ route('user-collections.add') }}" method="POST"  class="inline">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-700">Add to Library</button>
                                            </form>
                                            <span class="text-gray-500 mx-2">|</span>
                                            <a href="{{ route('books.edit', $book) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-700">Edit</a>
                                            <span class="text-gray-500 mx-2">|</span>
                                            <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-700">Delete</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="mt-2 flex items-center justify-center mb-5">
                                            <form action="{{ route('user-collections.add') }}" method="POST"  class="inline">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-700">Add to Library</button>
                                            </form>
                                        </div>
                                    @endif
                                </li>
                                <hr style="border: 1px solid white; width: 300px; margin-left: auto; margin-right: auto; margin-top: 10px;">
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
