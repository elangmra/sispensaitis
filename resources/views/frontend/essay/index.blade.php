@extends('frontend.layout.app')
@section('content')
    <section class="p-5 m-4">
        <div class="container mt-3">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <form action="{{ route('essay.score') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <h1>Score your Essay</h1>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-2">
                                        <label for="">Student Answer</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="student_answer"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-2">
                                        <label for="">Key Answer</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="key_answer">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Essay</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
