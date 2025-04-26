<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Order;
use App\Http\Requests\PaymentRequest;

class OrderController extends Controller
{
    public function index()
    {
        $today_count = Order::whereDate('updated_at', today())->count();
        $orders = Order::all()->sortBy('updated_at')->load('products');
        
        return view('customer.order.index', compact('today_count', 'orders'));
    }

    public function create()
    {
        return view('customer.order.create');
    }

    public function checkout(Order $order)
    {
        $order->load('products');
        return view('customer.order.checkout', compact('order'));
    }

    public function pay(Order $order, PaymentRequest $request)
    {
        $payment_amount = $request->validated()['payment_amount'];

        $order->payment->update([
            'status' => 'paid',
            'amount' => $payment_amount,
        ]);

        return redirect(route('order.index'))->with('toast', [
            'type' => 'success',
            'msg' => 'Payment successful!',
        ]);
    }

    public function cancel(Order $order)
    {
        foreach ($order->products as $product) {
            $product->increment('stock', $product->pivot->quantity);
        }

        $order->payment->update([
            'status' => 'cancelled',
        ]);

        return redirect(route('order.index'))->with('toast', [
            'type' => 'warning',
            'msg' => 'Order cancelled.',
        ]);
    }
}
