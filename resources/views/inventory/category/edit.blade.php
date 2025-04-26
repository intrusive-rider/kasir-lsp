<x-layouts.app>
    <main class="hero grow">
        <x-layouts.form method="PATCH" action="{{ route('category.update', $category) }}">
            <h1 class="text-2xl font-semibold">Edit category '{{ $category->name }}'</h1>
            <div>
                <x-forms.input value="{{ $category->name }}" name="name" placeholder="Name" icon="tag" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-soft">Edit</button>
                <a href="{{ route('product.index') }}" class="btn btn-ghost">Cancel</a>
            </div>
        </x-layouts.form>
    </main>
</x-layouts.app>

