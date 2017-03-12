<article class="brick entry format-gallery group animate-this">

    <div class="entry-thumb">

        {{--TODO: find a way to display images--}}

        <div class="post-slider flexslider">
            <ul class="slides">
                <li>
                    <img src="images/thumbs/gallery/work1.jpg">
                </li>
                <li>
                    <img src="images/thumbs/gallery/work2.jpg">
                </li>
                <li>
                    <img src="images/thumbs/gallery/work3.jpg">
                </li>
            </ul>
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

</article> <!-- end article -->