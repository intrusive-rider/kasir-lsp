<x-layouts.app>
    <main class="hero grow">
        <x-layouts.form method="POST" action="{{ route('login.store') }}">
            <h1 class="text-2xl font-semibold">👋 Welcome!</h1>
            <div>
                <x-forms.input name="email" placeholder="Email" icon="envelope" />
                <x-forms.input name="password" type="password" placeholder="Password" icon="key" />
            </div>
            <button type="submit" class="btn btn-primary btn-soft">Log in</button>
        </x-layouts.form>
    </main>
</x-layouts.app>
