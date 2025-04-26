<x-layouts.app>
    <div class="hero grow">
        <div class="hero-content flex gap-x-12 w-full">
            <x-layouts.form method="POST" action="{{ route('order.pay', $order) }}">
                <h1 class="text-2xl font-semibold">💁 Check out</h1>
                <x-forms.input type="number" step="1000" name="payment_amount" placeholder="Payment amount" icon="coins" />
                <div>
                    <button type="submit" class="btn btn-primary btn-soft">Pay</button>
                    <button type="submit" form="cancel-order" class="btn btn-ghost">Cancel</a>
                </div>
            </x-layouts.form>
            <x-layouts.form method="POST" action="{{ route('order.cancel', $order) }}" id="cancel-order" class="hidden" />
            <div class="text-right">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Name</th>
                                <th>Qty.</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $product)
                                <tr>
                                    <th class="text-center opacity-50 tabular-nums">{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td class="tabular-nums">&#215;{{ $product->pivot->quantity }}</td>
                                    <td class="tabular-nums">{{ number_format($product->price) }}</td>
                                    <td class="tabular-nums">
                                        {{ number_format($product->price * $product->pivot->quantity) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex justify-between">
                    <div class="text-sm opacity-50">Grand total:</div>
                    <span class="font-semibold text-2xl text-primary">{{ 'Rp' . number_format($order->total) }}</span>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
