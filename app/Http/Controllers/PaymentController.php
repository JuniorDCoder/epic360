<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Cart;

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        $user = auth()->user();
        // dd(Cart::tax(), Cart::total());

        // Sanitize and convert Cart total and tax to integers
        $total = (float) str_replace(',', '', Cart::total());
        $tax = (float) str_replace(',', '', Cart::tax());

        // Calculate the amount in cents
        $localPrice = (int) (($total - $tax) * 100);

        $quantity = 1;
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $checkoutSession = Session::create([
            'payment_method_types' => ['card', 'ideal', 'sepa_debit', 'sofort', 'bancontact'],
            'line_items' => [[
                'price_data' => [
                    'currency' => env('CASHIER_CURRENCY'),
                    'product_data' => [
                        'name' => 'Epic 360 Product Checkout', // Product name from the local cart
                    ],
                    'unit_amount' => $localPrice,
                ],
                'quantity' => $quantity, // Quantity of the product
            ]],
            'customer_email' => $user->email,
            'mode' => 'payment', // Single payment mode
            'success_url' => route('checkout-success'),
            'cancel_url' => route('cart.details'),
        ]);

        return redirect($checkoutSession->url);
    }

    public function cancelPayment(){
        return Inertia::render('Shop/PaymentCancelled');
    }
    public function successfulPayment(){
        Cart::destroy();
        return Inertia::render('Shop/PaymentSuccessful');
    }
}
