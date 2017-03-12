@extends('layout')

@section('content')
    <!-- content
   ================================================== -->
    <section id="content-wrap" class="site-page">
        <div class="row">
            <div class="col-twelve">

                <section>

                    <ul>
                        @foreach($list as $item)
                            <li>
                                <a href="{{ url('templates/'.$item) }}">
                                    {{ $item }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </section>
            </div>
        </div>
    </section>

@endsection