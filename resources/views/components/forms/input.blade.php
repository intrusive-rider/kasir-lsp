@props([
    'name' => '',
    'label' => null,
    'icon',
    'required' => true,
    'join' => false,
])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'required' => $required,
        'oninput' => $attributes->get('type') === 'number' ? "this.value = this.value.replace(/[^0-9]/g, '')" : "",
    ];
@endphp

<fieldset class="fieldset grow max-w-96">
    @isset($top_label)
        <legend class="fieldset-legend">
            {{ $top_label }}
        </legend>
    @endisset
    <label for="{{ $name }}" class="input w-full {{ $errors->has($name) ? 'input-error' : '' }}">
        @isset($icon)
            @svg('phosphor-' . $icon, 'w-6 h-6 opacity-50')
        @endisset
        <input {{ $attributes($defaults) }} />
    </label>
    <x-forms.error class="label pb-3" :messages="$errors->get($name)" />
</fieldset>
