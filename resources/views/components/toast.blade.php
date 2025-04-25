@props(['toast'])

@php
    $valid_types = ['success', 'error', 'warning', 'info'];
    $type = in_array($toast['type'] ?? null, $valid_types) ? $toast['type'] : 'info';

    $icon = match ($type) {
        'success' => 'check',
        'info' => 'info',
        'warning' => 'warning',
        'error' => 'x',
        default => 'square',
    };

    $msg = $toast['msg'] ?? '';
@endphp

<div class="toast toast-start hidden transition duration-250">
    <div role="alert" class="alert alert-soft alert-{{ $type }}">
        @svg('phosphor-' . $icon, 'w-6 h-6')
        <span>{{ $msg }}</span>
    </div>
</div>

<script>
    const toast = document.querySelector('.toast');
    toast.classList.remove('hidden');

    setTimeout(() => {
        toast.classList.add('opacity-0');
        setTimeout(() => toast.remove(), 250);
    }, 3000);
</script>
