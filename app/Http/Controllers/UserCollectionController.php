<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserCollectionController extends Controller
{
    public function showUserBooks()
    {
        $user = Auth::user();
        $books = $user->books;

        return view('user-collection.user-collection', compact('books'));
    }

    public function addToCollection(Request $request)
    {
        $user = Auth::user();
        $bookId = $request->book_id; // Ensure this is the correct book ID

        // Debug: Check the count of such books in the user's collection
        $count = $user->books()->where('books.id', $bookId)->count();

        if ($count > 0) {
            return redirect()->back()->with('error', 'This book is already in your collection.');
        }

        $user->books()->attach($bookId);
        return back()->with('success', 'Book added to collection successfully.');
    }

    public function removeBookFromCollection(Book $book)
    {
        $user = Auth::user();
        $user->books()->detach($book->id); // Detach the book from the user's collection

        return back()->with('success', 'Book removed from collection successfully.');
    }

}
