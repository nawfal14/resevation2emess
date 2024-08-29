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

    public function edit($id)
    {
        $show = Show::findOrFail($id);
        return view('admin.shows.edit', compact('show'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'poster_url' => 'nullable|url',
        ]);

        $show = Show::findOrFail($id);
        $show->update($request->only('title', 'description', 'duration', 'poster_url'));

        return redirect()->route('admin.shows.index')->with('success', 'Show updated successfully.');
    }

    public function destroy($id)
    {
        $show = Show::findOrFail($id);
        $show->delete();

        return redirect()->route('admin.shows.index')->with('success', 'Show deleted successfully.');
    }

    public function export($format)
    {
        // Logic to export data as CSV or PDF
    }
}
