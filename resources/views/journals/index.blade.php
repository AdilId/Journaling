@extends('layout')
@section('title', 'Journaling App')
@section('content')
    <div class="main-div">
        @foreach ($journals as $journal)
            <div class="journal">
                <div class="first-inf">
                    <h2>{{ date('D', strtotime($journal->date)) }} {{ $journal->date }}</h2>
                    <p>
                        @if (strlen($journal->journal) > 10)
                            {{ Str::substr($journal->journal, 0, 10) }}...
                        @else
                            {{ $journal->journal }}
                        @endif
                    </p>
                    <a href="{{ route('journals.show', ['journal' => $journal->id]) }}">Read More</a>
                </div>
                <div class="info">
                    <div class="avatar">
                        {{ Str::substr($journal->user->name, 0, 1) }}
                    </div>
                    {{ $journal->user->name }}
                    @can('update', $journal)
                        <div class="yours">Yours</div>
                    @endcan
                </div>
            </div>
        @endforeach
        <span class="links">{{ $journals->links() }}</span>
    </div>
@endsection
