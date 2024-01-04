<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        //dd($books);
        return view('dashboard', compact('books'));
    }


    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        $users = User::all();

        return view('books.create', compact('users'));
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'isbn' => 'required|string|max:255|unique:books',
            'description' => 'required|string',
        ]);

        $book = new Book($validatedData);
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Book $book)
    {
        $users = User::all();
        return view('books.edit', compact('book', 'users')); // View for editing a book
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'isbn' => 'required|max:255|unique:books,isbn,' . $book->id,
            'description' => 'required',
        ]);

        $book->update($validatedData);
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
