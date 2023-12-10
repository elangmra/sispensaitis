@extends('frontend.layout.app')
@section('content')
    <section class="p-5 m-4">
        <div class="container mt-3">
            <div class="row">
                <h1>Essay Score</h1>
                <p>Score: {{ $score }}</p>
                <p>Student Answer: {{ $student_answer }}</p>
                <p>Key Answer: {{ $key_answer }}</p>
                <a class="btn btn-secondary" href="{{ route('essay.index') }}">Back to Essay Menu</a>
            </div>
        </div>
    </section>


@endsection
