<?php

namespace App\Http\Controllers;

use Cart;
use Stripe\Stripe;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

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
            'payment_method_types' => ['card', 'ideal', 'bancontact'],
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

        // Create a new order
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $checkoutSession->amount_total / 100, // Convert to standard currency format
            'status' => 'pending',
        ]);

        // Create a transaction
        Transaction::create([
            'order_id' => $order->id,
            'stripe_session_id' => $checkoutSession->id,
            'amount' => $checkoutSession->amount_total / 100,
            'status' => 'pending', // Set based on the Stripe payment status
        ]);

        // Optional: Store order items (if you're tracking cart items)
        foreach (Cart::content() as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->id,
                'quantity' => $cartItem->qty,
                'price' => $cartItem->price,
            ]);
        }

        // Store the order ID in the session
        session(['order_id' => $order->id]);

        return redirect($checkoutSession->url);
    }

    public function cancelPayment(){
        return Inertia::render('Shop/PaymentCancelled');
    }

    public function successfulPayment(){
        // Retrieve the order ID from the session
        $orderId = session('order_id');
        $order = Order::find($orderId);


        // Update the order status to completed
        $order->update(['status' => 'completed']);

        // Clear the cart
        Cart::destroy();

        return Inertia::render('Shop/PaymentSuccessful', ['order' => $order]);
    }
}
