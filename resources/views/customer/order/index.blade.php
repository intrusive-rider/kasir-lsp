<x-layouts.app>
    <div class="flex items-baseline gap-x-12 p-8 grow">
        <header>
            <h1 class="text-2xl font-semibold">💵 Orders</h1>
            <div class="divider"></div>
            <div class="space-y-2">
                <h2 class="text-xl font-semibold">Stats</h2>
                <div class="stats">
                    <div class="stat pl-0">
                        <div class="stat-title">Today's count</div>
                        <div class="stat-value text-primary">{{ $today_count }}</div>
                    </div>
                    <div class="stat pr-0">
                        <div class="stat-title">Revenue</div>
                        <div class="stat-value text-primary">
                            <sup>Rp</sup>{{ number_format($orders->sum('total') / 1000) . 'k' }}
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="overflow-x-auto w-full">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center w-20"></th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="group hover:bg-base-300">
                            <td class="text-center w-20">
                                <span class="opacity-50 tabular-nums">{{ $loop->iteration }}</span>
                            </td>
                            <td class="w-80 h-16">
                                <ul class="group-hover:hidden list-disc">
                                    @foreach ($order->products as $product)
                                        <li>{{ $product->name }}</li>
                                    @endforeach
                                </ul>
                                <div class="drawer">
                                    <input id="order-details" type="checkbox" class="drawer-toggle" />
                                    <div class="drawer-content">
                                        <label for="order-details"
                                            class="hidden group-hover:inline font-bold link-hover drawer-button">Show more
                                            details</label>
                                    </div>
                                    <div class="drawer-side">
                                        <label for="order-details" class="drawer-overlay"></label>
                                        <aside class="p-4 bg-base-200 text-base-content min-h-full w-80 aside-4 space-y-6">
                                            <h1 class="text-2xl font-semibold">📃 Order details</h1>
                                            <div class="divider"></div>
                                            <p class="opacity-50"><span
                                                    class="capitalize">{{ $order->payment->status }}</span> on
                                                {{ $order->payment->updated_at->format('d M Y h:m')}}
                                            </p>
                                            <div class="space-y-3">
                                                <h2 class="text-xl font-semibold">Items</h2>
                                                <div class="overflow-auto">
                                                    <table class="table table-xs">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-right"></th>
                                                                <th>Name</th>
                                                                <th>Qty.</th>
                                                                <th>Price</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order->products as $product)
                                                                <tr>
                                                                    <th class="text-center opacity-50 tabular-nums">
                                                                        {{ $loop->iteration }}
                                                                    </th>
                                                                    <td>{{ $product->name }}</td>
                                                                    <td class="tabular-nums">
                                                                        &#215;{{ $product->pivot->quantity }}</td>
                                                                    <td class="tabular-nums">
                                                                        {{ number_format($product->price) }}
                                                                    </td>
                                                                    <td class="tabular-nums">
                                                                        {{ number_format($product->price * $product->pivot->quantity) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="space-y-3">
                                                <h2 class="text-xl font-semibold">Payment summary</h2>
                                                <div>
                                                    <div class="flex justify-between">
                                                        <div class="text-sm opacity-50">Grand total:</div>
                                                        <span
                                                            class="font-semibold text-xl text-secondary">{{ 'Rp' . number_format($order->total) }}</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <div class="text-sm opacity-50">Payment amount:</div>
                                                        <span
                                                            class="font-semibold text-xl text-secondary">{{ 'Rp' . number_format($order->payment->amount) }}</span>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="flex justify-between">
                                                        <div class="text-sm opacity-50">Change:</div>
                                                        <span
                                                            class="font-semibold text-2xl text-primary">{{ 'Rp' . number_format($order->payment->amount - $order->total) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                            </td>
                            <td class="tabular-nums">{{ number_format($order->total) }}</td>
                            <td class="capitalize">{{ $order->payment->status }}</td>
                            <td>{{ $order->updated_at->format('d M Y h:m') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center opacity-50">No order yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </main>
    </div>
</x-layouts.app>