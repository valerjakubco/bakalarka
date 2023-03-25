@extends('layouts.app')

@section('content')
    <h1>Recordings</h1>

    <ul>
        @foreach ($recordings as $recording)
            <li>
                <a href="{{ route('play-recording', ['filename' => $recording->getFilename()]) }}">
                    {{ $recording->getFilename() }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
