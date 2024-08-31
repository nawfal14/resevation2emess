<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Show;
use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $shows = Show::all();
        $artists = Artist::all();

        return view('admin.dashboard', [
            'users' => $users,
            'users_count' => $users->count(),
            'shows' => $shows,
            'shows_count' => $shows->count(),
            'artists' => $artists,
            'artists_count' => $artists->count(),
        ]);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'is_admin' => 'required|boolean',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'is_admin' => $request->input('is_admin'),
        ]);

        return redirect()->route('dashboard')->with('success', 'User updated successfully.');
    }
}
