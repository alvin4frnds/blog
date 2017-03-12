
@extends('layout')

@section('content')
    <!-- masonry
   ================================================== -->
    <section id="bricks">

        <div class="row masonry">

            <!-- brick-wrapper -->
            <div class="bricks-wrapper">

                {{--@php (dd($posts->toArray()))--}}

                @include("posts.big-slider")

                @if(isset($posts))
                    @foreach($posts->getCollection() as $post)

                        @include("posts.".$post->type)

                    @endforeach
                @endif

            </div> <!-- end brick-wrapper -->

        </div> <!-- end row -->

        {{ $posts->appends(Request::input())->links('partials.pagination') }}

    </section> <!-- end bricks -->

@endsection