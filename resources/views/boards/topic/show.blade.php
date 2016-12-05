@extends('layouts.app')

@section('content')
<main class="container">

    <section class="panel panel-default">
        <header class="panel-heading">
            <h1>{{ $topic->title }}</h1>
        </header>
        <article class="panel-body">
             <div class="row">
                <aside class="col-xs-3 col-md-2">
                    <div class="thumbnail">
                        <img src="@if($topic->user->use_gravatar) {{ $topic->user->gravatar }} @endif" alt="{{ $topic->user->name }}">
                        <div class="caption text-center">
                            <h5>{{ $topic->user->name }}</h5>
                            <voting type="topic" uid="{{ $topic->uid }}"></voting>
                        </div>
                    </div>
                </aside>
                <section class="col-xs-9 col-md-10">
                    {!! $topic->body !!}
                </section>
            </div>
        </article>  
    </section>  

    @foreach($topic->replies as $reply)
        <section class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <aside class="col-xs-3 col-md-2">
                        <div class="thumbnail">
                            <img src="@if($reply->user->use_gravatar) {{ $reply->user->gravatar }} @endif" alt="{{ $reply->user->name }}">
                            <div class="caption text-center">
                                <h5>{{ $reply->user->name }}</h5>
                                <voting type="reply" uid="{{ $reply->uid }}"></voting>
                            </div>
                        </div>
                    </aside>
                    <article class="col-xs-9 col-md-10"> 
                        {!! $reply->body !!}
                    </article>
                </div>
            </div>
        </section>
    @endforeach

</main>
@endsection