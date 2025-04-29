@php(extract($data))

<div class="p-4">
    <div class="mx-auto max-w-md">
        @foreach($curator_media_ids as $id)
            @php($media = \Awcodes\Curator\Models\Media::findOrFail($id))
            <img src="{{ Storage::url($media['path']) }}" alt="{{ $media['alt'] }}" width="{{ $media['width'] }}" height="{{ $media['height'] }}" />
        @endforeach
    </div>
</div>