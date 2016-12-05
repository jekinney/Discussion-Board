@extends('layouts.app')

@section('content')
<div class="container">
    <header class="page-header">
        <h1>{{ $board->title }}</h1>
    </header>
    <artcile> 
        <p>{{ $board->description }}</p>
    </artcile>
    <main>
        
        @foreach($board->topics as $topic)
            <section class="panel panel-default">
                <header class="panel-heading">
                    <h2 class="panel-title">{{ $topic->title }}</h2>
                    <p>Replies: {{ $topic->replies_count }}</p>
                </header>

                <div class="panel-body">
                    {{ $topic->description }}
                </div>
                
                <footer class="panel-footer">
                    <a href="{{ route('topic.show', $topic->slug) }}" >See Replies</a>
                </footer>
            </section>
        @endforeach

    </main>
</div>
@endsection