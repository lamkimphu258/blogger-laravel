@extends('layouts.base')

@section('title')
    My Posts
@endsection

@section('content')
    @include('partials.success-flash-message')
    <div class="row my-3">
        @foreach($posts as $post)
            <div class="col-6 my-5">
                <div class="d-flex flex-column">
                    <img src="https://via.placeholder.com/150" alt="Title thumbnail">
                    <div>
                        <h2><a href="{{ route('post-show', $post->id) }}">{{ ucwords($post->title) }}</a></h2>
                    </div>
                    <div class="text-muted">
                        {{ Carbon\Carbon::parse($post->published_at)->diffForHumans() }}
                    </div>
                    <div>
                        <span class="mr-5">
                            <a href="{{ route('post-delete', $post->id) }}" class="btn btn-warning">Delete</a>
                        </span>
                        <span>
                            <a href="{{ route('post-update', $post->id) }}" class="btn btn-info">Update</a>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
