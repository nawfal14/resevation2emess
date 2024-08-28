<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Show;
use App\Models\User;


class DashboardController extends Controller
{
    public function dashboard()
    {

        $users = User::all();
        $shows = Show::all();
        $artists = Artist::all();

        return view('dashboard', [
            'users' => $users,
            'users_count' => $users->count(),
            'shows' => $shows,
            'shows_count' => $shows->count(),
            'artists' => $artists,
            'artists_count' => $artists->count(),
        ]);
    }
}
