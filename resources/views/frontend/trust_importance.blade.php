@extends('frontend.layouts.master')
@push('header')
@endpush
@section('content')
    <style>
        .heading {}

        .content {
            text-align: justify;
            line-height: 2;
        }
    </style>
    <div class="container pt-5">
        <div class="row g-5 d-flex align-items-center">
            <div class="col-12 col-md-6">
                <h3 class="heading mb-4">Trust Importance</h3>
                <p class="content">
                    A living trust protects eliminates crucial assets such as your Home or any
                    other Real property including financial assets (Bank / Stock accounts) you
                    may have from being held by a court order. Without a Living Trust, a “Will”

                    will be subjected to a probate process if you did not have a trust in place
                    at the time of your death and your assets will be contested. A Trust also
                    assists with a much more seamless legal transition of your assets to who
                    you yourself chose as beneficiaries of your assets or life’s work. This is
                    your “Living Trust” chosen by you when you were alive.
                    You also get to choose who executes your wishes incase you become ill ,
                    Hospitalized or incapacitated in case you cannot make a proper decision.
                    Your Trust will dictate by your choice who will have Legal Authority to
                    carry out decision when you no longer can.
                    Your Trust can also include medical directives or medical power of
                    Attorney’s naming individual you Trust to enforce your decisions that you
                    would like to be executed in your name.
                    Lastly but most importantly, A Trust will name a primary and secondary
                    guardian in case you have children under the age of 18. A properly
                    created and executed Living Trust will dictate and plan for the protection
                    and future of your under aged Children.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <img class="img-fluid"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/11808feea347ffb42c98d70fc5b5c2a45e97a371011ee8c0a3b2ff1b117823df?format=webp&placeholderIfAbsent=true&width=2000"
                    alt="">
            </div>
        </div>
    </div>
@endsection

@push('footer-js')
@endpush
