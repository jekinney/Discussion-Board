@extends('layouts.app')

@section('content')
<main class="container">

    <section class="panel panel-default">
        <header class="panel-heading">
            <h1>{{ $topic->title }}</h1>
        </header>
        <article class="panel-body"> 
            {!! $topic->body !!}
        </article>  
    </section>  

        @foreach($topic->replies as $reply)
            <section class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <aside class="col-xs-3 col-md-2">
                            Media
                        </aside>
                        <article class="col-xs-9 col-md-10"> 
                            {!! $reply->body !!}
                        </article>
                    </div>
            </section>
        @endforeach

</main>
@endsection