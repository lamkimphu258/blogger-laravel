@extends('layouts.base')

@section('title')
    Login
@endsection

@section('content')
    <h1 class="text-center text-bold">Register</h1>
    <form action="{{route('register')}}" method="POST">
        @csrf
        @if ($errors->any('name', 'email', 'password'))
            @include('partials.error-flash-message')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
