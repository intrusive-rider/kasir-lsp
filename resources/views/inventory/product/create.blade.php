<x-layouts.app>
    <main class="hero grow">
        <x-layouts.form method="POST" action="{{ route('product.store') }}">
            <h1 class="text-2xl font-semibold">Create product</h1>
            <div>
                <x-forms.input name="name" placeholder="Name" icon="package" />
                <x-forms.input type="number" step="1000" name="price" placeholder="Price" icon="coins" />
                <x-forms.input type="number" name="stock" placeholder="Stock" icon="stack" />
                <x-forms.select name="category_id" placeholder="Category" icon="tag">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-forms.select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-soft">Create</button>
                <a href="{{ route('product.index') }}" class="btn btn-ghost">Cancel</a>
            </div>
        </x-layouts.form>
    </main>
</x-layouts.app>
