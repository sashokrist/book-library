<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard', compact('books'));
    }

    public function create()
    {
        $users = User::all();
        $authors = Author::all();

        return view('books.create', compact('users', 'authors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'isbn' => 'required|string|max:255|unique:books',
            'description' => 'required|string',
        ]);

        $book = new Book($validatedData);
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

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

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Book::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('isbn', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->get();

        return view('books.search', compact('books'));
    }

    public function show(Request $request)
    {
        $query = $request->input('query');

        $books = Book::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('isbn', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->get();

        return view('books.search', compact('books'));
    }
}
