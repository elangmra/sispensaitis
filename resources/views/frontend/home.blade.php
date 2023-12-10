@extends('frontend.layout.app')
@section('content')
    <section class="p-5 m-4">
        <div class="container mt-3">
            <div class="row  d-flex align-items-center">
                <div class="col-md-7">
                    <h1 style="font-size: 48px;">
                        <strong>
                            <span class="text-primary">Automate your scoring essay</span>
                        </strong>
                    </h1>
                    <p class="text-secondary">
                        Transform Your Grading Process with Advanced AI Technology
                    </p>

                    <button class="btn btn-primary px-3 py-2">
                        Get Started
                    </button>
                    <button class="btn btn-outline-primary px-3 py-2 ms-2">
                        Learn More
                    </button>
                </div>
                <div class="col-md-5">
                    <img class="img-fluid img-hero" src="{{ asset('images/infinity.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
