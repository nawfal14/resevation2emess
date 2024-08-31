<?php

namespace App\Http\Controllers;

use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::paginate(8);
        return view('artists.index', compact('artists'));
    }

    public function show($id)
    {
        $artist = Artist::with('shows')->findOrFail($id);
        return view('artists.show', compact('artist'));
    }
}
