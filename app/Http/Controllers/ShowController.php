<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{

    public function index()
    {
        $shows = Show::all();
        return view('shows.index', compact('shows'));
    }


    public function show($id)
    {
        $show = Show::with(['artists', 'representations.location'])->findOrFail($id);
        return view('shows.show', compact('show'));
    }
}
