<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score your Essay') }}
        </h2>
    </x-slot>
    <section class="p-5 m-4">
        <div class="container mt-3">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <form action="{{ route('essay.score') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="row">
                            <div class="col-12">
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
                                <x-primary-button type="submit" class="mt-3">Submit Essay</x-primary-button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>

</x-app-layout>
