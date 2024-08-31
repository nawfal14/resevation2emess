<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Show;
use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['user', 'representation.show'])->paginate(8);
        return view('reservations.index', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::with(['user', 'representation.show'])->findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    public function create($show_id)
    {
        $show = Show::with('representations')->findOrFail($show_id);
        $prices = Price::where('show_id', $show_id)->get();
        $users = User::all();
        return view('reservations.create', compact('show', 'users', 'prices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'representation_id' => 'required|exists:representations,id',
            'booking_date' => 'required|date',
            'status' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price_id' => 'required|exists:prices,id',
            'stripeToken' => 'required|string',
        ]);

        try {
            $price = Price::findOrFail($request->price_id);
            Stripe::setApiKey(config('services.stripe.secret'));

            $charge = Charge::create([
                'amount' => $request->quantity * ($price->price * 100),
                'currency' => 'eur',
                'source' => $request->stripeToken,
                'description' => 'Reservation payment',
            ]);

            Log::info('Reservation created successfully');

            Reservation::create($request->all());
            return redirect()->route('reservations.index')->with('success', 'Réservation effectuée avec succès!');

        } catch (\Exception $e) {
            Log::error('Error creating reservation: ' . $e->getMessage());

            return back()->withErrors(['stripe_error' => $e->getMessage()]);
        }
    }
}
