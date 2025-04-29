{{--
Weird bug here. Url is single dimension array.
--}}

<div class="p-4">
    <div class="mx-auto max-w-md">
        @foreach($curator_media_ids as $media)
            <img src="{{ Storage::url($media['path']) }}" alt="{{ $media['alt'] }}" width="{{ $media['width'] }}" height="{{ $media['height'] }}" />
        @endforeach
    </div>
</div>