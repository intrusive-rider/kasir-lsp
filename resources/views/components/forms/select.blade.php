@props(['name', 'label' => null, 'placeholder' => '', 'icon', 'required' => true])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'grow',
        'required' => $required,
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
        <select {{ $attributes($defaults) }}>
            <option value="" selected disabled>{{ $placeholder }}</option>
            {{ $slot }}
        </select>
    </label>
    <x-forms.error class="label pb-3" :messages="$errors->get($name)" />
</fieldset>
