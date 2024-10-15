@extends('layout')
@section('title', 'Login')
@section('content')
    <div class="create-journal">
        <form action="{{ route('profile.login') }}" method="POST">
            @csrf
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
            <div class="error">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <label>Password:</label>
            <input type="password" name="password" value="{{ old('password') }}">
            <div class="error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <button>Login</button>
        </form>
    </div>
@endsection
