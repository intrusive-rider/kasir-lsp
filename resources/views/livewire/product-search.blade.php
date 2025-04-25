<search class="w-full space-y-3">
    <div class="flex items-center justify-between">
        <x-forms.input wire:model.live="search" name="search" placeholder="Search products" icon="magnifying-glass" />
        <div>
            <x-modal name="categories" title="Categories">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold">🏷️ Categories</h1>
                    <button class="btn btn-primary btn-soft">New category</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center w-20"></th>
                                <th>Name</th>
                                <th>Product count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr class="group hover:bg-base-300">
                                    <td class="text-center w-20">
                                        <span
                                            class="opacity-50 tabular-nums group-hover:hidden">{{ $loop->iteration }}</span>
                                        <span class="hidden group-hover:inline">
                                            <button class="btn btn-sm btn-ghost" type="submit">
                                                @svg('phosphor-trash-bold', 'w-5 h-5 text-error')
                                            </button>
                                        </span>
                                    </td>
                                    <td class="w-56 h-16">
                                        <a class="link-hover">
                                            <span class="group-hover:hidden">{{ $category->name }}</span>
                                            <span class="hidden group-hover:inline font-bold">Edit
                                                {{ $category->name }}</span>
                                        </a>
                                    </td>
                                    <td class="tabular-nums">{{ $category->products->count() }}</td>
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center opacity-50">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-modal>
            <a href="{{ route('product.create') }}" class="btn btn-primary btn-soft">New product</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center w-20"></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="group hover:bg-base-300">
                        <th class="text-center w-20">
                            <span class="opacity-50 tabular-nums group-hover:hidden">{{ $loop->iteration }}</span>
                            <span class="hidden group-hover:inline">
                                <button class="btn btn-sm btn-ghost" type="submit">
                                    @svg('phosphor-trash-bold', 'w-5 h-5 text-error')
                                </button>
                            </span>
                        </th>
                        <td class="w-56 h-16">
                            <a class="link-hover">
                                <span class="group-hover:hidden">{{ $product->name }}</span>
                                <span class="hidden group-hover:inline font-bold">Edit
                                    {{ $product->name }}</span>
                            </a>
                        </td>
                        <td class="tabular-nums">{{ number_format($product->price) }}</td>
                        <td class="tabular-nums">{{ $product->stock }}</td>
                        <td>{{ $product->category ? $product->category->name : '<em>None</em>' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center opacity-50">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</search>
