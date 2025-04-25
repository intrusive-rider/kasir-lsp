<div class="flex items-baseline gap-x-12 p-8 grow">
    <header class="w-xs">
        <h1 class="text-2xl font-semibold">💵 Create order</h1>
        <div class="divider"></div>

        <div class="space-y-3">
            <div class="space-y-2">
                <h2 class="text-xl font-semibold">Cart</h2>
                <div class="stats">
                    <div class="stat pl-0">
                        <div class="stat-title">Items</div>
                        <div class="stat-value text-primary">
                            {{ collect($this->cart)->sum('qty') }}
                        </div>
                    </div>
                    <div class="stat pr-0">
                        <div class="stat-title">Total</div>
                        <div class="stat-value text-primary">
                            <sup>Rp</sup>{{ number_format(collect($this->cart)->sum('total') / 1000) . 'k' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <h2 class="text-xl font-semibold">Stocks</h2>
                <div class="h-50 overflow-auto">
                    <table class="table table-xs">
                        <thead>
                            <tr>
                                <th class="text-right"></th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th class="text-right opacity-50 tabular-nums">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td class="tabular-nums">{{ $item->stock }}</td>
                                    <td class="tabular-nums">{{ $item->price / 1000 . 'k' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </header>

    <main class="w-full space-y-3">
        <div class="flex items-start justify-between">
            <form wire:submit="add" class="w-full flex items-baseline gap-x-1">
                <x-forms.select wire:model="item_id" name="item_id" placeholder="Select products" icon="package">
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </x-forms.select>

                <div class="w-40">
                    <x-forms.input type="number" wire:model="qty" name="qty" placeholder="Qty." icon="hash" />
                </div>

                <button type="submit" class="btn btn-neutral-content btn-soft btn-square">
                    @svg('phosphor-plus', 'w-6 h-6')
                </button>
            </form>

            <div class="w-full text-right">
                <a href="{{ route('dashboard') }}" class="btn btn-ghost">Cancel</a>
                <button wire:click="checkout" class="btn btn-primary btn-soft">Check out</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center w-20"></th>
                        <th>Name</th>
                        <th>Qty.</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $index => $item)
                        <tr class="group hover:bg-base-300">
                            <th class="text-center w-20">
                                <span class="opacity-50 tabular-nums group-hover:hidden">{{ $loop->iteration }}</span>
                                <span class="hidden group-hover:inline">
                                    <button wire:click="remove({{ $item['id'] }})" class="btn btn-sm btn-ghost">
                                        @svg('phosphor-trash-bold', 'w-5 h-5 text-error')
                                    </button>
                                </span>
                            </th>
                            <td class="w-56 h-16">{{ $item['name'] }}</td>
                            <td class="tabular-nums">
                                <div class="w-40">
                                    <x-forms.input type="number"
                                        wire:change="updateQty({{ $index }}, $event.target.value)"
                                        value="{{ $item['qty'] }}" name="cart.{{ $index }}.qty" placeholder="Qty."
                                        icon="hash" />

                                </div>
                            </td>
                            <td class="tabular-nums">{{ number_format($item['total']) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center opacity-50">No items added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
