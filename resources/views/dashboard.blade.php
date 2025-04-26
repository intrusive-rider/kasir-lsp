<x-layouts.app>
    <main class="hero grow">
        <div class="hero-content">
            <div class="space-y-6">
                <div class="flex items-baseline justify-between">
                    <h1 class="text-4xl font-semibold">😊 Hello, {{ Auth::user()->name }}!</h1>
                    <p class="text-xl opacity-50">Ready for business?</p>
                </div>
                <div class="flex gap-x-4">
                    <div
                        class="card w-96 bg-primary card-lg hover:scale-105 hover:rotate-2 transition ease-in-out duration-300">
                        <div class="card-body text-primary-content">
                            <h1 class="flex justify-between">
                                <div class="card-title">Storage</div>
                                <div class="text-right opacity-50">
                                    <div class="text-xl font-semibold">{{ $stock === 0 ? 'No' : $stock }} items</div>
                                    <div class="text-xs uppercase tracking-wider">{{ $product === 0 ? 'No' : $product }}
                                        products in {{ $category === 0 ? 'no' : $category }} categories</div>
                                </div>
                            </h1>
                        </div>
                    </div>
                    <div
                        class="card w-96 bg-accent card-lg hover:scale-105 hover:-rotate-3 transition ease-in-out duration-300">
                        <div class="card-body text-accent-content">
                            <h1 class="flex justify-between">
                                <div class="card-title">Today's revenue</div>
                                <div class="text-right opacity-50">
                                    <div class="text-xl font-semibold">{{ $revenue }}</div>
                                    <div class="text-xs uppercase tracking-wider">{{ $order === 0 ? 'No' : $order }}
                                        orders today</div>
                                </div>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>