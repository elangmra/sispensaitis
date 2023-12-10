@extends('frontend.layout.app')
@section('content')
    <section class="p-5 m-4">
        <div class="container">
            <div class="row">
                <form action="{{ route('essay.score') }}" method="POST">
                    @csrf
                    <textarea name="student_answer"></textarea>
                    <input type="hidden" name="key_answer" value="Manusia adalah makhluk sosial">
                    <button type="submit">Submit Essay</button>
                </form>
            </div>
        </div>
    </section>

@endsection
