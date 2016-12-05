@extends('layouts.app')

@section('content')
<div class="container">
    <header class="page-header">
        <h1>Welcome to the Discussion Board proof of concept</h1>
    </header>
    <main>
        
        @foreach($boards as $board)
            <section class="panel panel-default">
                <header class="panel-heading">
                    <h2 class="panel-title">{{ $board->title }}</h2>
                    <p>Topics: {{ $board->topics_count }}</p>
                </header>

                <div class="panel-body">
                    {{ $board->description }}
                </div>
                
                <footer class="panel-footer">
                    <a href="{{ route('board.show', $board->slug) }}" >See All Topics</a>
                </footer>
            </section>
        @endforeach

    </main>
</div>
@endsection