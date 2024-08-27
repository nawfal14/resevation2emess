@extends('layouts.app')

@section('title', 'Artiste')

@section('content')

<script src="https://js.stripe.com/v3/"></script>

<div class="container mt-5">
    <h1>Réserver pour {{ $show->title }}</h1>
    <form method="POST" id="payment-form" action="{{ route('reservations.store') }}">
        @csrf
        <div class="form-group">
            <label for="user_id">Utilisateur</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="representation_id">Représentation</label>
            <select class="form-control" id="representation_id" name="representation_id" required>
                @foreach($show->representations as $representation)
                    <option value="{{ $representation->id }}">{{ $representation->schedule }} -
                        {{ $representation->location->designation ?? ''}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="booking_date">Date de réservation</label>
            <input class="form-control" type="date" id="booking_date" name="booking_date" required>
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <input class="form-control" type="text" id="status" name="status" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantité:</label>
            <input class="form-control" type="number" name="quantity" id="quantity" required>
        </div>
        <div class="form-group">
            <label for="price_id">Prix:</label>
            <select class="form-control" name="price_id" id="price_id" required>
                @foreach($prices as $price)
                    <option value="{{ $price->id }}">{{ $price->type }} - ${{ number_format($price->price, 2) }}</option>
                @endforeach
            </select>
        </div>


        <h1> Payment</h1>
        <div class="form-group">
            <label for="card-number">Card Number</label>
            <div class="form-control" id="card-number"></div>
        </div>
        <div class="form-group">
            <label for="card-expiry">Expiration Date</label>
            <div class="form-control" id="card-expiry"></div>
        </div>
        <div class="form-group">
            <label for="card-cvc">CVC</label>
            <div class="form-control" id="card-cvc"></div>
        </div>
        <div class="form-group">
            <label for="card-name">Cardholder Name</label>
            <input class="form-control" type="text" id="card-name" name="card-name" required>
        </div>

        <script>
            const stripe = Stripe('pk_test_51POMNWAHVS49u2CFr4ggXVhsHW8IYfL31bBCciugyrw3Zwdu45bJOubqc9aDY7VlkvOsyzaSKrhbnMU0eWrBdE8Z004AKYR7oG');
            const elements = stripe.elements();

            const cardNumber = elements.create('cardNumber');
            const cardExpiry = elements.create('cardExpiry');
            const cardCvc = elements.create('cardCvc');

            cardNumber.mount('#card-number');
            cardExpiry.mount('#card-expiry');
            cardCvc.mount('#card-cvc');

            const form = document.getElementById('payment-form');
            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const { token, error } = await stripe.createToken(cardNumber);

                if (error) {
                    console.log(error);
                    window.alert(error.message);
                } else {
                    console.log('Token created:', token)
                    const hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        </script>

        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>

@endsection