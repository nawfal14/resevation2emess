<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Show;
use App\Models\Artist;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function exportUsersToCSV()
    {
        $users = User::all();
        $filename = "users.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['First Name', 'Last Name', 'Email', 'Is Admin']);

        foreach ($users as $user) {
            fputcsv($handle, [$user->firstname, $user->lastname, $user->email, $user->is_admin ? 'Yes' : 'No']);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function exportUsersToPDF()
    {
        $users = User::all();
        $pdf = PDF::loadView('exports.users', compact('users'));
        return $pdf->download('users.pdf');
    }

    public function exportShowsToCSV()
    {
        $shows = Show::all();
        $filename = "shows.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['Title', 'Duration', 'Created In', 'Location ID', 'Bookable']);

        foreach ($shows as $show) {
            fputcsv($handle, [$show->title, $show->duration, $show->created_in, $show->location_id, $show->bookable ? 'Yes' : 'No']);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function exportShowsToPDF()
    {
        $shows = Show::all();
        $pdf = PDF::loadView('exports.shows', compact('shows'));
        return $pdf->download('shows.pdf');
    }

    public function exportArtistsToCSV()
    {
        $artists = Artist::all();
        $filename = "artists.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['First Name', 'Last Name']);

        foreach ($artists as $artist) {
            fputcsv($handle, [$artist->firstname, $artist->lastname]);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function exportArtistsToPDF()
    {
        $artists = Artist::all();
        $pdf = PDF::loadView('exports.artists', compact('artists'));
        return $pdf->download('artists.pdf');
    }
}