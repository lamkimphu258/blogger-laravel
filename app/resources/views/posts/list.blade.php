@extends('layouts.base')

@section('title')
    Post List
@endsection

@section('content')
    <div class="container">
        <div class="row my-3">
            @foreach($posts as $post)
                <div class="col-6 my-5">
                    <div class="d-flex flex-column">
                        <img src="https://via.placeholder.com/150" alt="Title thumbnail">
                        <div>
                            <h2><a href="{{ route('post-show', $post->slug) }}">{{ $post->title }}</a></h2>
                        </div>
                        <div class="text-muted">
                            {{ Carbon\Carbon::parse($post->published_at)->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
