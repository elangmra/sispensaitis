@extends('frontend.layout.app')
@section('content')
    <h1>Essay Score</h1>
    <p>Score: {{ $score }}</p>

    <button>
        <a href="{{ route('essay.index') }}">Back to Essay</a>
    </button>

@endsection
