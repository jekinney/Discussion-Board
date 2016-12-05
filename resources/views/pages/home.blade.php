@extends('layouts.app')

@section('content')
<div class="container">
    <header class="page-header">
        <h1>Welcome to the Discussion Board proof of concept</h1>
    </header>
    <main class="row">
        
        @foreach($boards as $board)
            <div class="col-md-8 col-md-offset-2">
                <section class="panel panel-default">
                    <header class="panel-heading">
                        <h2 class="panel-title">{{ $board->name }}</h2>
                    </header>

                    <div class="panel-body">
                        {{ $board->description }}
                    </div>
                    
                    <footer class="panel-footer">
                        <a href="{{ route('board.show', $board) }}" >See All Topics</a>
                    </footer>
                </div>
            </div>
        @endforeach

    </main>
</div>
@endsection