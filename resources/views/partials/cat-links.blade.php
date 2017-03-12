@if(isset($tags))

    <div class="entry-meta">
		<span class="cat-links">
			@foreach($tags as $tag)
				<a href="{{ url("tag/".$tag->name) }}">{{ $tag->title }}</a>
			@endforeach
		</span>
    </div>
@endif