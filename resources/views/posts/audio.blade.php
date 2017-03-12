<!-- format audio here -->
<article class="brick entry format-audio animate-this">

    <div class="entry-thumb">
        <a href="{{ postLink($post) }}" class="thumb-link">
            <img src="{{ $post->featured }}" alt="concert">
        </a>

        <div class="audio-wrap">
            <audio id="player" src="{{ $post->attachment->url }}" width="100%" height="42" controls="controls"></audio>
        </div>
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

</article> <!-- /article -->