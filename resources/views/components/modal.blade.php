@props([
    'name',
    'title',
])

<button class="btn btn-ghost" onclick="{{ $name }}.showModal()">{{ $title }}</button>
<dialog id="{{ $name }}" class="modal">
    <div class="modal-box max-w-2xl max-h-[40rem] space-y-3">
        {{ $slot }}
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>Close</button>
    </form>
</dialog>
