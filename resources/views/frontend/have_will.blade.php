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
                <h3 class="heading mb-4">Having only a Will</h3>
                <p class="content">
                    A Will only serve a singular purpose. Wills cannot on their own have an
                    estate of a loved one or your own avoid probate once you have passed on.
                    completely public. Unlike a Living Trust, a will on its own can also be more
                    easily challenged in court than if you had a Will and Living Trust together.
                    The court process of a will without a Living Trust is known as probate. This
                    process can be Lengthy and Costly to the Beneficiaries and Heirs of the
                    Estate. If your will is challenged, all your assets can be held for years while
                    in probate. Another important aspect of a will is that it offers you no legal
                    protection while you are alive.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <img class="img-fluid"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1ec3df604a08efe174c7f28c27a012223deb5e4b6b55d9c784731f5f6092f29?format=webp&placeholderIfAbsent=true&width=2000"
                    alt="">
            </div>
        </div>
    </div>
@endsection

@push('footer-js')
@endpush
