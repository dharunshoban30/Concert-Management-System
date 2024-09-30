<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Ticket Booking</h2>
            <p class="mb-4">Enter your details to book your ticket!</p>
        </header>

        <form action="{{ route('tickets.store') }}" method="post" id="payment-form">
            @csrf
            <div class="mb-6">
                <label for="contact_no" class="inline-block font-bold text-lg mb-2">Contact Number</label>
                <input type="tel" class="border border-gray-200 rounded p-2 w-full" name="contact_no"
                    value="{{ old('contact_no') }}" placeholder="Enter contact number" />
                @error('contact_no')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="address" class="inline-block font-bold text-lg mb-2">Address</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="address"
                    placeholder="Enter address">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Stripe Elements Placeholder -->
            <div class="mb-6">
                <label for="card-element" class="inline-block font-bold text-lg mb-2">
                    Credit or Debit Card
                </label>
                <div id="card-element" class="border border-gray-200 rounded p-2 w-full">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert" class="text-red-500 text-xs mt-2"></div>
            </div>

            <div class="mb-6">
                <button id="submit-button" class="bg-laravel font-bold text-white rounded py-2 px-4 hover:bg-black" type="submit">Pay with Stripe</button>
            </div>
            <div class="mb-6">
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // Initialize Stripe with your publishable key
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        stripe.confirmCardPayment('{{ $clientSecret }}', {
            payment_method: {
                card: card,
                // Additional billing details fields can be added here
            },
        }).then(function(result) {
            if (result.error) {
                // Show error in #card-errors div
                document.getElementById('card-errors').textContent = result.error.message;
            } else {
                // Payment success
                if (result.paymentIntent.status === 'succeeded') {
                    // Redirect or inform the user of success
                    window.location.replace('/payment-success');
                }
            }
        });
    });
</script>
