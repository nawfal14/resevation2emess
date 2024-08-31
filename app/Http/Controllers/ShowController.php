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

    public function create()
    {
        return view('shows.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'poster_url' => 'nullable|url',
            'date' => 'required|date',
        ]);

        Show::create($request->only('title', 'description', 'duration', 'poster_url', 'date'));

        return redirect()->route('dashboard')->with('success', 'Show created successfully.');
    }

    public function edit($id)
    {
        $show = Show::findOrFail($id);
        return view('shows.edit', compact('show'));
    }

    public function update(Request $request, $id)
    {
        \Log::info('Updating show with data: ', $request->all());
    
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'poster_url' => 'nullable|url',
            'date' => 'required|date',
        ]);
    
        $show = Show::findOrFail($id);
        \Log::info('Before update: ', $show->toArray());
    
        $show->update($request->only('title', 'description', 'duration', 'poster_url', 'date'));
    
        \Log::info('After update: ', $show->toArray()); // Log the show data after the update
    
        return redirect()->route('dashboard')->with('success', 'Show updated successfully.');
    }

    public function destroy($id)
    {
        $show = Show::findOrFail($id);
        $show->delete();

        return redirect()->route('dashboard')->with('success', 'Show deleted successfully.');
    }
}