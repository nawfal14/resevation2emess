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
        // sans pagination
        // $users = User::all();
        // $shows = Show::all();
        // $artists = Artist::all();

        // avec pagination
        $users = User::paginate(5);
        $shows = Show::paginate(5);
        $artists = Artist::paginate(5);

        return view('admin.dashboard', [
            'users' => $users,
            'users_count' => $users->count(),
            'shows' => $shows,
            'shows_count' => $shows->count(),
            'artists' => $artists,
            'artists_count' => $artists->count(),
        ]);
    }
    public function showCreateUserForm()
    {
        return view('admin.createUser');
    }

    public function addNewUser(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'is_admin' => $request->input('is_admin'),
        ]);

        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
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
