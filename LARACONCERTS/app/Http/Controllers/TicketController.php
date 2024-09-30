<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Ticket;
use App\Models\Listing;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function create($listingId)
    {
        $listing = Listing::findOrFail($listingId);
        $ticketPrice = $listing->ticket_price;

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $ticketPrice * 100, // Convert price to cents
            'currency' => 'usd',
        ]);

        return view('ticket.book', [
            'clientSecret' => $paymentIntent->client_secret,
            'ticketPrice' => $ticketPrice, // Pass ticket price to the view
        ]);
    }


    
    public function store(Request $request, $listingId)
    {
        \Log::info('Store method called.');

        // Fetch the listing
        $listing = Listing::findOrFail($listingId);

        // Initialize Stripe with your secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Validate the request, excluding 'email' from validation
        $validated = $request->validate([
            'contact_no' => 'required',
            'address' => 'required',
            'name' => 'required',
        ]);

        \Log::info('Request validated.', $validated);

        // Create a PaymentIntent with the order amount and currency
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $listing->ticket_price * 100, // Convert to cents
                'currency' => 'usd',
                'payment_method' => $request->input('payment_method_id'),
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            \Log::info('PaymentIntent created.', ['status' => $paymentIntent->status]);

            // Check if payment was successful
            if ($paymentIntent->status === 'succeeded') {
                // Here you handle ticket creation, e.g., saving to the database
                $ticket = new Ticket([
                    'user_id' => auth()->id(),
                    'contact_no' => $validated['contact_no'],
                    'address' => $validated['address'],
                    'name' => $validated['name'],
                    'listing_id' => $listing->id, // Assuming you have a relationship set up
                ]);

                \Log::info('About to save ticket', ['ticket' => $ticket->toArray()]);

                $ticket->save();

                \Log::info('Ticket saved successfully', ['ticket_id' => $ticket->id]);

                // Instead of returning back, redirect to the payment-success view
                return redirect()->route('payment.success')->with('message', 'Ticket booked successfully!');

            } else {
                \Log::info('PaymentIntent not succeeded.', ['status' => $paymentIntent->status]);
                // Handle other payment statuses accordingly
                return back()->with('error', 'Payment failed! Please try again!');
            }
        } catch (\Exception $e) {
            \Log::error('Error in payment or saving ticket.', ['exception' => $e->getMessage()]);
            // Handle error
            return back()->with('error', $e->getMessage());
        }
    }



    public function view()
    {
        $userTickets = auth()->user()->tickets; // Assuming you have a relationship set up in your User model

        return view('ticket.view', ['tickets' => $userTickets]);
    }

}
