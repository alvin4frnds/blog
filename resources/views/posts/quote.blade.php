<article class="brick entry format-quote animate-this" >

    <div class="entry-thumb">
        <blockquote>
            @foreach(explode(". ", $post->content) as $line)
                <p>{{ $line }}.</p>
            @endforeach

            <cite>{{ $post->author->name }}</cite>
        </blockquote>
    </div>

</article> <!-- end article -->