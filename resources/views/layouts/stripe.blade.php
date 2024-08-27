<h1>Reservation Payment</h1>
<form id="payment-form">
    <div>
        <label for="card-number">Card Number</label>
        <!-- <div id="card-number"></div> -->
        <input type="text" id="card-number" name="card-number" required>
    </div>
    <div>
        <label for="card-expiry">Expiration Date</label>
        <!-- <div id="card-expiry"></div> -->
        <input type="text" id="card-expiry" name="card-expiry" required>
    </div>
    <div>
        <label for="card-cvc">CVC</label>
        <!-- <div id="card-cvc"></div> -->
        <input type="text" id="card-cvc" name="card-cvc" required>
    </div>
    <div>
        <label for="card-name">Cardholder Name</label>
        <input type="text" id="card-name" name="card-name" required>
    </div>
    <button type="submit">Pay Now</button>
</form>

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
            console.error(error);
            window.alert(error.message);
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
</script>