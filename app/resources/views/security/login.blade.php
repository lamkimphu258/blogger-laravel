@extends('layouts.base')

@section('title')
    Login
@endsection

@section('content')
    <h1 class="text-center text-bold">Login</h1>
    <form action="{{route('authenticate')}}" method="POST">
        @csrf
        @if ($errors->any('email', 'password'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
@endsection
