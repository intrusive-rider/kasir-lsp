<x-layouts.app>
    <div class="flex items-baseline gap-x-12 p-8 grow">
        <header>
            <h1 class="text-2xl font-semibold">📦 Products</h1>
            <div class="divider"></div>
            <div class="space-y-2">
                <h2 class="text-xl font-semibold">Stats</h2>
                <div class="stats">
                    <div class="stat pl-0">
                        <div class="stat-title">Products</div>
                        <div class="stat-value text-primary">{{ $products }}</div>
                    </div>
                    <div class="stat pr-0">
                        <div class="stat-title">Storage</div>
                        <div class="stat-value text-primary">{{ $storage }}</div>
                    </div>
                </div>
            </div>
        </header>
        <livewire:product-search />
    </div>
</x-layouts.app>
