@php(extract($data))

<div class="p-4">
    <div class="mx-auto max-w-md">
        @if($url)
            <img src="{{ Storage::url($url) }}" alt="{{ $alt ?? '' }}" />
        @endif
    </div>
</div>