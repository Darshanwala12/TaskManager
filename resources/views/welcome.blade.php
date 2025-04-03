@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Welcome to Task Manager</h1>
    @guest
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
    @else
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Go to Tasks</a>
    @endguest
</div>
@endsection
