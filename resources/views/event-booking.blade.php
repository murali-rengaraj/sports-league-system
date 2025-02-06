@extends('layouts.master')

@section('content')
    @if ($errors->has('stripe_error'))
        <div class="container w-50 mt-3">
            <div class="alert alert-danger text-center" id="hideAlert">
                {{ $errors->first('stripe_error') }}
            </div>
        </div>
    @endif
    <div class="container w-50 my-1">
        <h2 class="text-center text-success">Event Booking</h2>
        <form id="payment-form" action="{{ route('event.booking.process') }}" method="POST">
            @csrf

            <div class="mb-2">
                <label for="name" class="form-label"><b>Full Name</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p class="alert-sm alert-danger">{{ $errors->first('name') }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label for="email" class="form-label"><b>Email Address</b><span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}" required>
                @error('email')
                    <p class="alert-sm alert-danger">{{ $errors->first('email') }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label for="phone" class="form-label"><b>Phone Number</b></label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <p class="alert-sm alert-danger">{{ $errors->first('phone') }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label for="event_id" class="form-label"><b>Select Event</b><span class="text-danger">*</span></label>
                <select class="form-control" id="event_id" name="event_id" required>
                    @forelse ($events as $event)
                        <option value="{{ $event->id }}" data-price="{{ $event->price }}" @if (old('event_id')== $event->id)
                            selected
                        @endif>{{ $event->name }}
                            ({{ $event->date }})</option>
                    @empty
                        <option value="">No Event Found</option>
                    @endforelse
                </select>
                @error('event_id')
                    <p class="alert-sm alert-danger">{{ $errors->first('event_id') }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label for="ticket_quantity" class="form-label"><b>Number of Tickets</b><span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="ticket_quantity" name="ticket_quantity" min="1" max="5" value="{{ old('ticket_quantity', 1) }}" required>
                @error('ticket_quantity')
                    <p class="alert-sm alert-danger">{{ $errors->first('ticket_quantity') }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label"><strong>Payment Details</strong><span class="text-danger">*</span></label>
                <div id="card-element" class="form-control"></div>
                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
            </div>

            <div class="mb-2">
                <label for="total_amount" class="form-label"><b>Total Amount (₹)</b></label>
                <input type="text" class="form-control" id="total_amount" name="total_amount" readonly>
            </div>

            <div class="mb-2 form-check">
                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">I agree to the terms and conditions</label><span class="text-danger">*</span>
                @error('terms')
                    <p class="alert-sm alert-danger">{{ $errors->first('terms') }}</p>
                @enderror
            </div>
            @error('stripeToken')
                <p class="alert-sm alert-danger">{{ $errors->first('stripeToken') }}</p>
            @enderror

            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    </div>

    <!-- Stripe Integration -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe("{{ config('cashier.key') }}");
        var elements = stripe.elements();
        var card = elements.create("card");
        card.mount("#card-element");

        var form = document.getElementById("payment-form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    document.getElementById("card-errors").textContent = result.error.message;
                } else {
                    var hiddenInput = document.createElement("input");
                    hiddenInput.setAttribute("type", "hidden");
                    hiddenInput.setAttribute("name", "stripeToken");
                    hiddenInput.setAttribute("value", result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            let eventSelect = document.getElementById("event_id");
            let ticketInput = document.getElementById("ticket_quantity");
            let amountInput = document.getElementById("total_amount");

            function updateAmount() {
                let selectedEvent = eventSelect.options[eventSelect.selectedIndex];
                let ticketPrice = parseFloat(selectedEvent.getAttribute("data-price")) || 0;
                let ticketQuantity = parseInt(ticketInput.value) || 1;
                let totalAmount = ticketPrice * ticketQuantity;

                amountInput.value = totalAmount.toFixed(2);
            }

            eventSelect.addEventListener("change", updateAmount);
            ticketInput.addEventListener("input", updateAmount);

            updateAmount();
        });
        document.addEventListener('DOMContentLoaded', function() {
            const hideAlert = document.getElementById('hideAlert');
            setTimeout(function() {
                hideAlert.style.display = 'none';
            }, 4500)
        });
    </script>
@endsection
