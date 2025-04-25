<nav {{ $attributes(['class' => 'navbar px-4 border-b-2 border-gray-500/10']) }}>
    <div class="navbar-start">
        <a href="{{ route('dashboard') }}" class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
    </div>
    <ul class="navbar-center menu menu-horizontal gap-x-1">
        <li><a href="{{ route('dashboard') }}" class="{{ request()->is('/') ? 'menu-active' : '' }}">Dashboard</a></li>
        <li><a href="{{ route('order.create') }}" class="{{ request()->is('order/*') ? 'menu-active' : '' }}">Create order</a></li>
        <li><a href="{{ route('order.index') }}" class="{{ request()->is('orders') ? 'menu-active' : '' }}">Orders</a></li>
        <li><a href="{{ route('product.index') }}" class="{{ request()->is('products/*', 'products') ? 'menu-active' : '' }}">Products</a></li>
    </ul>
    <div class="navbar-end">
        <button type="submit" form="logout" class="btn btn-ghost">Log out</button>
        <x-layouts.form method="DELETE" action="{{ route('logout') }}" id="logout" class="hidden" />
    </div>
</nav>
