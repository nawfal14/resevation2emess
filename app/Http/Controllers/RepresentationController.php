<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use Illuminate\Http\Request;

class RepresentationController extends Controller
{
    public function index()
    {
        $representations = Representation::with(['show', 'location'])->get();
        return view('representations.index', compact('representations'));
    }

    public function show($id)
    {
        $representation = Representation::with(['show', 'location'])->findOrFail($id);
        return view('representations.show', compact('representation'));
    }
}
