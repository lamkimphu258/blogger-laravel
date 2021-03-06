@extends('layouts.base')

@section('title')
    Post Show
@endsection

@section('content')
    @if ($errors->any())
        @include('partials.error-flash-message')
    @endif
    <h2>{{ \Illuminate\Support\Str::upper($post->title) }}</h2>
    <p>Author: {{ $post->author->name }}</p>
    <div class="d-flex justify-content-between">
        <span class="text-muted">{{ Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</span>
        <div class="d-flex justify-content-between" style="width: 75px;">
            <div class="like">
                <span>{{ $post->like }}</span>
                <span>
                    <a style="color: black" href="{{ route('post-vote', ['post' => $post, 'vote' => \App\Enums\VoteEnum::LIKE]) }}">
                        <i class="far fa-thumbs-up"></i>
                    </a>
                </span>
            </div>
            <div class="dislike">
                <span>{{ $post->dislike }}</span>
                <span>
                        <a style="color: black" href="{{ route('post-vote', ['post' => $post, 'vote' => \App\Enums\VoteEnum::DISLIKE]) }}">
                            <i class="far fa-thumbs-down"></i>
                        </a>
                    </span>
            </div>
        </div>
    </div>
    {!! $post->content !!}
@endsection
