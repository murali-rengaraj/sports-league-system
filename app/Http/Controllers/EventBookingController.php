<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class EventBookingController extends Controller
{
    public function index()
    {
        $events = Event::where('date', '>', Carbon::now())->paginate(4);
        return view('events', compact('events'));
    }
    public function showForm()
    {
        $events = Event::where('date', '>', Carbon::now())->get();
        return view('event-booking', compact('events'));
    }
    public function success()
    {
        return view('booking-success');
    }
    public function processBooking(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'phone'=> 'sometimes|integer|digits:10',
            'event_id' => 'required|exists:events,id',
            'ticket_quantity' => 'required|integer|min:1|max:5',
            'terms' => 'required|accepted',
            'stripeToken' => 'required'
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Fetch event details
        $event = Event::findOrFail($request->event_id);

        // Calculate total amount based on event price
        $amount = $event->price * $request->ticket_quantity * 100; // Convert to paise  (if Stripe uses minor units)
        try {
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'inr',
                'source' => $request->stripeToken,
                'description' => "Event Booking for " . $request->name
            ]);

            // Stripe response if success
            // echo "hi";
            // dd($charge);

            Booking::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'event_id' => $request->event_id,
                'ticket_quantity' => $request->ticket_quantity,
                'payment_status' => 'paid'
            ]);

            return redirect()->route('event.booking.success')->with([
                'success' => 'Booking successful!',
                'name' => $request->name,
                'event_name' => $event->name,
                'ticket_quantity' => $request->ticket_quantity,
                'amount' => $amount/100,
            ]);
        } catch (CardException $e) {
            // Card-related error (e.g., expired card)
            // Stripe response if failed
            // dd($e);
            Booking::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'event_id' => $request->event_id,
                'ticket_quantity' => $request->ticket_quantity,
                'payment_status' => 'failed'
            ]);
            return back()->withErrors(['stripe_error' => 'Card error: ' . $e->getMessage()]);
        } catch (ApiErrorException $e) {
            return back()->withErrors(['stripe_error' => 'There was an error processing your payment. Please try again later.']);
        } catch (\Exception $e) {
            return back()->withErrors(['stripe_error' => 'An unexpected error occurred. Please try again.']);
        }
    }
}
