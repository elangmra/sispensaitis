@extends('frontend.layout.app')
@section('content')
<section class="p-5 m-4">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fs-1">
                            <strong>
                                <span class="text-primary">SISPENSAITIS</span>
                            </strong>
                        </h1>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="text-secondary">
                            Sistem Penilaian Essay Otomatis
                        </p>
                    </div>

                </div>


            </div>
            <div class="col-md-4">
                <img class="img-fluid" src="{{ asset('images/infinity.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection
