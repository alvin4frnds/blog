<article class="brick entry format-video animate-this">

    <div class="entry-thumb video-image">
        <a href="{{ $post->attachment->url }}" data-lity>
            <img src="{{ $post->featured }}" alt="bokeh">
        </a>
    </div>

    <div class="entry-text">
        <div class="entry-header">
            @php ($tags = $post->tags)
            @include('partials.cat-links')

            <h1 class="entry-title"><a href="{{ postLink($post) }}">{{ $post->title }}</a></h1>

        </div>
        <div class="entry-excerpt">
            {{ $post->content }}
        </div>
    </div>

</article> <!-- end article -->