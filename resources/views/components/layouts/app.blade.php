<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💵</text></svg>">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body {{ $attributes(['class' => 'antialiased min-h-screen flex flex-col']) }}>
    <x-layouts.navbar class="{{ request()->is('login') || request()->is('order/checkout/*') ? 'hidden' : '' }}" />
    @if (session('toast'))
        <x-toast :toast="session('toast')" />
    @endif
    {{ $slot }}
</body>

</html>