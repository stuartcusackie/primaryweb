Welcome to the home page for {{ $school->name }}

<div>
    <h2>Articles</h2>

    @foreach($articles as $article)
        <h3>{{ $article->title }}</h3>

        @foreach($article->content as $block)
            @include("sites.partials.blocks.{$block['type']}", ['data' => $block['data']])
        @endforeach
    @endforeach
</div>