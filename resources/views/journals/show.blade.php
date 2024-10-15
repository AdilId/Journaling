@extends('layout')
@section('title', 'Journal')
@section('content')
    <div class="container">
        <div class="information">
            <h2>{{ date('D', strtotime($journal->date)) }} {{ $journal->date }}</h2>
            <div>
                {{ $journal->journal }}
            </div>
            <hr>
            @can('update', $journal)
                <a href="{{ route('journals.edit', ['journal' => $journal->id]) }}">Update</a>
            @endcan
            @can('delete', $journal)
                <form class="delete-form" action="{{ route('journals.destroy', ['journal' => $journal->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            @endcan
        </div>
    </div>
@endsection
