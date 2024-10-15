@extends('layout')
@section('title', 'Create Journal')
@section('content')
    <div class="create-journal">
        <form action="{{ route('journals.store') }}" method="POST">
            @csrf
            <label>Name:</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}">
            <div class="error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <label>Date:</label>
            <input type="datetime" name="date" value="{{ date('Y-m-d H:i:s') }}">
            <div class="error"> @error('date')
                    {{ $message }}
                @enderror
            </div>
            <label>Journal:</label>
            <textarea name="journal" cols="30" rows="10"></textarea>
            <div class="error">
                @error('journal')
                    {{ $message }}
                @enderror
            </div>
            <button>Create</button>
        </form>
    </div>
@endsection
