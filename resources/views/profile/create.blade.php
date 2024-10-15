@extends('layout')
@section('title', 'Register')
@section('content')
    <div class="create-journal">
        <form action="{{ route('profile.register') }}" method="POST">
            @csrf
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            <div class="error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
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
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation">
            <button>Register</button>
        </form>
    </div>
@endsection
