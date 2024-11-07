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
                <h3 class="heading mb-4">Trust without a will</h3>
                <p class="content">
                    The important benefits of a Trust is that it serves as a variety of crucial
                    functions. These protective functions of a Living trust benefit you while
                    you are alive, ill or unable to make proper cognitive decisions as well as
                    when you have departed. That is why it is also known as a &quot;living&quot; trust.
                    Wills can also be public and not define or have any legal application when
                    you are alive. Living trust is completely private. With a Trust, probate can
                    be avoided is more difficult to contest. Your Trust is assets are passed to
                    heirs from a trust quickly. As mentioned earlier, think of the trust as a
                    complete contingency plan for your life.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <img class="img-fluid"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/12f90efe5caa5370f2274d1be8a58548fa7cf6b0450e22cbc37bb937661e8ed4?format=webp&placeholderIfAbsent=true&width=2000"
                    alt="">
            </div>
        </div>
    </div>
@endsection

@push('footer-js')
@endpush
