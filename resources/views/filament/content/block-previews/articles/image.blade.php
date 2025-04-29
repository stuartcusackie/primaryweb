{{--
Weird bug here. Url is single dimension array.
--}}

<div class="p-4">
    <div class="mx-auto max-w-md">
        @dump($curator_media_ids)
        {{--
        @if($url)
            <img src="{{ Storage::url(array_values($url)[0]) }}" alt="{{ $alt ?? '' }}" />
        @endif
        --}}
    </div>
</div>