<x-layouts.app>
    <main class="hero grow">
        <x-layouts.form method="POST" action="{{ route('category.store') }}">
            <h1 class="text-2xl font-semibold">Create category</h1>
            <div>
                <x-forms.input name="name" placeholder="Name" icon="tag" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-soft">Create</button>
                <a href="{{ route('product.index') }}" class="btn btn-ghost">Cancel</a>
            </div>
        </x-layouts.form>
    </main>
</x-layouts.app>

