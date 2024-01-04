<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Book;
use App\Models\User;
use App\Models\UserCollection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $userId = Auth::id();
        $collections = UserCollection::with('books')
            ->where('user_id', $userId)
            ->get();

       // dd($collections);

        $books = Book::orderBy('created_at', 'desc')->paginate(10);

        return view('profile.edit', [
            'user' => $request->user(),
            'collections' => $collections,
            'books' => $books,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function manage()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('profile.manage', compact('users'));
    }

    public function toggleActive(User $user)
    {
        $user->active = !$user->active;
        $user->save();

        return back()->with('success', 'User status updated successfully.');
    }

    public function toggleAdminStatus(User $user)
    {
        $user->isAdmin = !$user->isAdmin;
        $user->save();

        return back()->with('success', 'User status updated successfully.');
    }
}
