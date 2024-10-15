@extends('layout')
@section('title', 'Update Journal')
@section('content')
    <div class="create-journal">
        <form action="{{ route('journals.update', ['journal' => $journal->id]) }}" method="POST">
            @csrf
            @method('put')
            <label>Name:</label>
            <input type="text" name="name" value="{{ $journal->user->name }}">
            <div class="error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <label>Date:</label>
            <input type="datetime" name="date" value="{{ $journal->date }}">
            <div class="error">
                @error('date')
                    {{ $message }}
                @enderror
            </div>
            <label>Journal:</label>
            <textarea name="journal" cols="30" rows="10">{{ $journal->journal }}</textarea>
            <div class="error">
                @error('journal')
                    {{ $message }}
                @enderror
            </div>
            <button>Create</button>
        </form>
    </div>
@endsection
