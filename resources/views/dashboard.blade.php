<x-app-layout>
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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('BOOK LIBRARY') }}
        </h2>
        @if(auth()->user() && auth()->user()->isAdmin)
            <!-- Button to Create New Book (Visible only to Admins) -->
            <a href="{{ route('books.create') }}"
               class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">Create
                New Book</a>

            <a href="{{ route('users.manage') }}"
               class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">Manage
                users</a>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Check if the authenticated user's active status is 0 -->
            @if(auth()->user() && auth()->user()->active == 0)
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                    <p class="font-bold">Notice</p>
                    <p>Your registration is not active yet.</p>
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        @if(auth()->user() && auth()->user()->isAdmin)
                            <p class="text-lg">{{ __("You're logged in as admin! ") }}{{ auth()->user()->name }}.</p>
                        @else
                            <p class="text-lg">{{ __("You're logged in as a regular user! ") }} {{ auth()->user()->name }}
                                .</p>
                        @endif
                            Total books in library: ({{ $books->total() }})

                        <!-- List of Books -->
                        <div class="mt-6">
                            <ul class="mt-2">
                                @foreach($books as $book)
                                    <li class="mt-1">
                                        Name: <strong>{{ $book->name }}</strong><br>
                                        ISBN: <strong>{{ $book->isbn }}</strong> <br>
                                        Description:
                                        <trong>{{ $book->description }}</trong>
                                        <br>
                                        @if(auth()->user() && auth()->user()->isAdmin)
                                            <!-- Admin Action Buttons -->
                                            <div class="mt-2 flex items-center justify-center mb-5">
                                                <form action="{{ route('user-collections.add') }}" method="POST"
                                                      class="inline">
                                                    @csrf
                                                    <input type="hidden" name="user_id"
                                                           value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                    <button type="submit"
                                                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-700">
                                                        Add to Library
                                                    </button>
                                                </form>
                                                <span class="text-gray-500 mx-2">|</span>
                                                <a href="{{ route('books.edit', $book) }}"
                                                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-700">Edit</a>
                                                <span class="text-gray-500 mx-2">|</span>
                                                <form action="{{ route('books.destroy', $book) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-700">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="mt-2 flex items-center justify-center mb-5">
                                                <form action="{{ route('user-collections.add') }}" method="POST"
                                                      class="inline">
                                                    @csrf
                                                    <input type="hidden" name="user_id"
                                                           value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                    <button type="submit"
                                                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-700">
                                                        Add to Library
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </li>
                                    <hr style="border: 1px solid white; width: 300px; margin-left: auto; margin-right: auto; margin-top: 10px;">

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex justify-center mt-4">
                        {{ $books->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
