@extends('layouts.app')



@section('content')
        <script>
            function playRecording(filename) {
                var player = document.getElementById('video-player');
                var source = player.getElementsByTagName('source')[0];
                source.src = "{{ route('play-recording', ['filename' => ':filename']) }}".replace(':filename', filename);
                player.load();
                player.play();
            }
        </script>
    <h1>Recordings</h1>

    <div class="row">
        <div class="col-md-6">
            <ul>
                @foreach ($recordings as $recording)
                    <li>
                    <a href="#" onclick="playRecording('{{ $recording->getFilename() }}')">
                            {{ $recording->getFilename() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <video id="video-player" controls>
                <source src="" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
    </div>
@endsection



@section('styles')
    <style>
        video {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection
