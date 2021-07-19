@extends('layouts.base')

@section('title')
    Home
@endsection

@section('content')
    <div class="container my-5">
        @foreach($categories as $category)
            <h2 class="mt-5">{{ Illuminate\Support\Str::upper($category->label) }}</h2>
            <div id="{{ Illuminate\Support\Str::slug($category->label) }}" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner">
                    @foreach($category->posts as $post)
                        <div
                            class="{{ $post->title === $category->posts()->first()->title ? 'carousel-item active' : 'carousel-item'}}">
                            <a href="{{ route('post-show', $post) }}">
                                <img src="https://via.placeholder.com/150" alt="Title thumbnail" class="d-block w-100"
                                     style="height: 150px">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $post->title }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#{{ Illuminate\Support\Str::slug($category->label) }}"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#{{ Illuminate\Support\Str::slug($category->label) }}"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endforeach
    </div>
@endsection
