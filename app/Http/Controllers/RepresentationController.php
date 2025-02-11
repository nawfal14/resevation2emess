<?php

namespace App\Http\Controllers;

use App\Models\Representation;

class RepresentationController extends Controller
{
    public function index()
    {
        $representations = Representation::with(['show', 'location'])->paginate(8);
        return view('representations.index', compact('representations'));
    }

    public function show($id)
    {
        $representation = Representation::with(['show', 'location'])->findOrFail($id);
        return view('representations.show', compact('representation'));
    }
}
