@extends('layouts.base')

@section('title')
    Post Create
@endsection

@section('content')
    <h1 class="text-center text-bold">Update Post</h1>
    <form action="{{route('post-update', $post->id)}}" method="POST">
        @csrf
        @include('partials.success-flash-message')
        @if ($errors->any('title', 'content', 'author_id'))
            @include('partials.error-flash-message')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="content" class="form-control" id="content" name="content" value="{{ $post->content }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
