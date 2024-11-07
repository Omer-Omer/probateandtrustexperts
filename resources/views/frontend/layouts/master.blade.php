<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    {{-- <title>Economy &minus; A Steer Company</title>

    <meta charset="UTF-8">
    <meta name="description" content="A Steer Company">
    <meta name="keywords" content="Economy">
    <meta name="author" content="Umar Rashid">  --}}

    <title> {{ str_replace('_', ' ', config('app.name')) }} </title>
    {{-- <title> Italy Fabric </title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @stack('page_meta')


    <link type="image/x-icon" rel="icon" href="{{ asset('assets/favicon.webp') }}" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,700;1,400;1,500&display=swap" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-ygAvsZZd+lc3eVoPo9qN4zQvgsH8l/9xqDNpD9E0Pl4V4Bt37r6CFKi7txQHwq4x" crossorigin="anonymous"> --}}

    {{-- <script type="text/javascript" src="{{ asset('frontend/js/slick-carousel/1.8.1/slick.min2b6a.js') }}"></script> --}}

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        form,
        form label {
            font-family: 'poppins', sans-serif;
        }
        .tinos-regular {
            font-family: "Tinos", serif;
            font-weight: 400;
            font-style: normal;
        }
        .tinos-bold {
            font-family: "Tinos", serif;
            font-weight: 700;
            font-style: normal;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
        .navbar .navbar-brand {
            width: 200px;
        }
        .navbar .nav-item .nav-link {
            padding: 10px 15px !important;
            text-transform: uppercase;
        }

        .c-contact-us {
            background-color: #8f633e;
            color: white;
            padding: 12px 60px;
            text-decoration: none;
        }
        .body-content {
            padding-top: 120px;
        }
        @media only screen and (max-width: 768px) {}
    </style>

    @stack('header')

</head>

<body class="">

    @include('frontend.layouts.header')

    <section class="body-content">
        @yield('content')
    </section>

    @include('frontend.layouts.footer')

    {{-- Js Script --}}

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

    {{-- <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script> --}}

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    @stack('footer-js')
    @stack('script')


    <script>
        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: false, // Hide arrows
            responsive: [
                {
                    breakpoint: 768, // Adjust as per your mobile breakpoint
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script>
        $('.logo-multiple-items').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: true,
            arrows: false, // Hide arrows
            responsive: [
                {
                    breakpoint: 768, // Adjust as per your mobile breakpoint
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script>
        $(document).ready(function() {

            $('.search-submit-btn').removeAttr('disabled');
            $('.search-from').submit(function(e) {
                e.preventDefault();

                $('.search-form-error').text('');
                // $('.btn-loader').show();

                if ($('#company').val() === '' && $('#product').val() === '' && $('#location').val() ===
                    '') {
                    $('.search-form-error').text('At least one input is required');
                    setTimeout(function() {
                        $('.search-form-error').text('');
                    }, 2000);
                    // $('.btn-loader').hide();
                } else {
                    // $('.btn-loader').hide();
                    // If at least one input has a value, submit the form
                    $(this).unbind('submit').submit();
                }
            });
        });
    </script>

</body>

</html>
