@extends('frontend.layouts.master')
@push('header')

@endpush
@section('content')


<style>
    .primary-bg-color {
        background-color: #8f633e;
    }
    .bg-color-1 {
        background-color: rgba(234,229,226,.88);
    }
    .primary-color {
        color: #8f633e;
    }

    .text-dn {
        text-decoration: none !important;
    }
    .section-one {
        /* padding-top: 120px; */
    }
    .section-one .sec-left {
        padding: 30px 100px;
    }
    .section-one .sec-left .sl-heading {
        font-size: 40px;
        line-height: 1.2;
    }
    .section-one .sec-right img {
        width: 100%;
    }
    .news-section .top_heading {
        font-size: 35px;
    }
    .aboutus-section .sec-right .sr-heading {
        font-size: 35px;
    }
    .aboutus-section .sec-right .sr-body {
        color: #a4a2a2;
        line-height: 2;
        font-weight: 300;
    }
    @media only screen and (max-width: 768px) {
        .section-one .sec-left {
            padding: 30px 30px !important;
        }
    }
</style>
<section class="section-one bg-color-1">

        <div class="row g-0">
            <div class="col-12 col-md-7">
                <div class="sec-left text-center">
                    <h3 class="sl-heading">
                        PROTECTING THE VICTIMS OF SEXUAL HARASSMENT & DISCRIMINATION
                    </h3>
                    <p class="sl-body my-5">
                        If you are being sexually harassed at work, discriminated against based on your race, denied reasonable accommodations for your disability, or terminated for whistleblowing, call us today. Avloni Law steps in to fight for justice, protect the victims and bring about meaningful change in the workplace.
                    </p>
                    <a class="primary-bg-color text-white py-2 px-5 text-dn" href="{{ url('/') }}">Contact Us</a>
                </div>
            </div>
            <div class="col-12 col-md-5">
               <div class="sec-right">
                    <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2023/12/home-hero-v4-scaled-1-2048x1367.webp" alt="">
               </div>
            </div>
        </div>

</section>

<section class="news-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="py-5 tinos-regular top_heading">Our Firm In The News</h3>
            </div>
            <div class="col-12">
                <div class="slider multiple-items">
                    <div>
                        <div class="row g-1">
                            <div class="col-3">
                                <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2023/02/Yahoo-Finance-logo-e1676986909806.webp" alt="">
                            </div>
                            <div class="col-9">
                                <p>
                                    Whistleblower claims UC Santa Cruz cheated donors, then fired her for exposing it
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row g-1">
                            <div class="col-3">
                                <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2023/02/SF-Chronicle-logo.jpg" alt="">
                            </div>
                            <div class="col-9">
                                <p>
                                    Whistleblower claims UC Santa Cruz cheated donors, then fired her for exposing it
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row g-3">
                            <div class="col-3">
                                <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2023/02/techcrunch-logo-B444826970-seeklogo.com_.png" alt="">
                            </div>
                            <div class="col-9">
                                <p>
                                    Whistleblower claims UC Santa Cruz cheated donors, then fired her for exposing it
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row g-3">
                            <div class="col-3">
                                <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2023/02/Betakit_FullColour_Logo_Web_505px.png" alt="">
                            </div>
                            <div class="col-9">
                                <p>
                                    Whistleblower claims UC Santa Cruz cheated donors, then fired her for exposing it
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="aboutus-section my-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-md-6">
                <img height="500px" width="100%" class="" src=https://avlonilaw.com/wp-content/uploads/2022/05/practice.webp"" alt="">
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <div class="sec-right">
                    <h3 class="sr-heading mb-3 tinos-regular">About Us</h3>
                    <p class="sr-body mb-5">Avloni Law is a boutique plaintiffs’ litigation law firm taking on the world’s largest corporations and entities and fighting for the rights of victims through employment litigation and more. We fight with creativity and determination to continue to raise the bar of legal representation and results. We believe in taking on every case with the goal of achieving the best outcome and seek to return real change and recovery to the clients we represent. We have a network of offices, including San Francisco, Los Angeles and San Jose, and our reach throughout California is not limited to the cities where we maintain offices.   </p>

                    <a class="primary-bg-color text-white py-2 px-5 text-dn" href="{{ url('/') }}">View Practice Areas</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .law-section .top_heading {
        font-size: 35px;
    }
    .law-section h3 {
        font-size: 24px;
    }
    .law-section p {
        /* text-align: justify; */
        color: #a4a2a2;
        line-height: 2;
        font-weight: 300;
    }
</style>
<section class="law-section bg-color-1 py-4 my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="py-5 tinos-regular top_heading">Why Choose Avloni Law</h3>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <div class="col-4">
                                <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2022/05/bag-icon.svg" alt="">
                            </div>
                            <div class="col-8">
                                <h3 class="mb-3"> Experience </h3>
                                <p>
                                    From trials, arbitrations to mediations, we have the experience to obtain a just resolution for you. While other plaintiffs’ firms settle to avoid trial, Avloni Law stays dedicated to cases until we believe a just resolution has been achieved.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <div class="col-4">
                                <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2022/05/scale-icon.svg" alt="">
                            </div>
                            <div class="col-8">
                                <h3 class="mb-3"> Dedication </h3>
                                <p>
                                    From trials, arbitrations to mediations, we have the experience to obtain a just resolution for you. While other plaintiffs’ firms settle to avoid trial, Avloni Law stays dedicated to cases until we believe a just resolution has been achieved.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <div class="col-4">
                                <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2022/05/law-icon.svg" alt="">
                            </div>
                            <div class="col-8">
                                <h3 class="mb-3"> Results </h3>
                                <p>
                                    From trials, arbitrations to mediations, we have the experience to obtain a just resolution for you. While other plaintiffs’ firms settle to avoid trial, Avloni Law stays dedicated to cases until we believe a just resolution has been achieved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .logo-multiple-items img {
        height: 175px;
        width: 175px;
        padding: 10px;
    }
</style>
<section class="logo-section">
    <div class="container">
        <div class="row">
            {{-- <div class="col-12 text-center">
                <h3 class="py-5 tinos-regular top_heading">Our Firm In The News</h3>
            </div> --}}
            <div class="col-12">
                <div class="slider logo-multiple-items">
                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2022/10/client-choice-removebg-preview-e1666233816856.png" alt="">
                    </div>
                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2022/07/super-lawyers-award.png" alt="">
                    </div>
                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2022/07/top-100-1.png" alt="">
                    </div>
                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2022/10/client-choice-removebg-preview-e1666233816856.png" alt="">
                    </div>
                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2023/04/best-of-bar-2023.gif" alt="">
                    </div>
                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2022/07/top10-award.png" alt="">
                    </div>

                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2022/07/cela-award.png" alt="">
                    </div>
                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2022/07/top-40-badge.png" alt="">
                    </div>

                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2023/07/top10-employment-lawyer-removebg-preview.png" alt="">
                    </div>
                    <div>
                        <img class="" src="https://avlonilaw.com/wp-content/uploads/2023/09/BestOf-SanFrancisco.png" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .rd-section .sec-left {
        padding: 65px 170px 65px 100px;
    }
    .rd-section .sec-left .sl-heading {
        font-size: 40px;
        line-height: 1.2;
    }
    .rd-section .sec-left .sl-body {
        color: #a4a2a2;
        line-height: 2;
        font-weight: 300;
    }
    .rd-section .sec-right img {
        width: 100%;
    }
    @media only screen and (max-width: 768px) {
        .rd-section .sec-left {
            padding: 30px 30px !important;
        }
        .rd-section .sec-left a {
            font-size: 12px;
        }
    }
</style>
<section class="rd-section bg-color-1">

    <div class="container">
        <div class="row g-0 py-5">
            <div class="col-12 col-md-7">
                <div class="sec-left">
                    <h3 class="sl-heading tinos-regular">
                        Racial Discrimination
                    </h3>
                    <p class="sl-body my-5">
                        Everyone deserves to work in a supportive, safe and fair environment. Harassment and discrimination have no place in the modern workplace. When employers fail to provide it, both California and federal law provide protections for employees.
                    </p>
                    <a class="primary-color text-whitetext-dn" href="{{ url('/') }}">
                        LEARN MORE ABOUT RACE DISCRIMINATION
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="sec-right">
                    <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2023/12/home-hero-v4-scaled-1-2048x1367.webp" alt="">
                </div>
            </div>
        </div>
    </div>

</section>

<style>
    .dr-section .sec-right {
        padding: 20px 100px 20px 100px;
    }
    .dr-section .sec-right .sl-heading {
        font-size: 40px;
        line-height: 1.2;
    }
    .dr-section .sec-right .sl-body {
        color: #a4a2a2;
        line-height: 2;
        font-weight: 300;
    }
    .dr-section .sec-left img {
        width: 100%;
    }
    @media only screen and (max-width: 768px) {
        .dr-section .sec-right {
            padding: 30px 30px !important;
        }
        .dr-section .sec-right a {
            font-size: 12px;
        }
    }
</style>

<section class="dr-section">
    <div class="container">
        <div class="row g-0 py-5">
            <div class="col-12 col-md-5">
                <div class="sec-left">
                    <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2023/12/home-hero-v4-scaled-1-2048x1367.webp" alt="">
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="sec-right">
                    <h3 class="sl-heading tinos-regular">
                        Racial Discrimination
                    </h3>
                    <p class="sl-body my-5">
                        Everyone deserves to work in a supportive, safe and fair environment. Harassment and discrimination have no place in the modern workplace. When employers fail to provide it, both California and federal law provide protections for employees.
                    </p>
                    <a class="primary-color text-whitetext-dn" href="{{ url('/') }}">
                        LEARN MORE ABOUT RACE DISCRIMINATION
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .wp-section .sec-left {
        padding: 65px 170px 65px 100px;
    }
    .wp-section .sec-left .sl-heading {
        font-size: 40px;
        line-height: 1.2;
    }
    .wp-section .sec-left .sl-body {
        color: #a4a2a2;
        line-height: 2;
        font-weight: 300;
    }
    .wp-section .sec-right img {
        width: 100%;
    }
    @media only screen and (max-width: 768px) {
        .wp-section .sec-left {
            padding: 30px 30px !important;
        }
        .wp-section .sec-left a {
            font-size: 12px;
        }
    }
</style>
<section class="wp-section bg-color-1">

    <div class="container">
        <div class="row g-0 py-5">
            <div class="col-12 col-md-7">
                <div class="sec-left">
                    <h3 class="sl-heading tinos-regular">
                        Whistleblower Protections
                    </h3>
                    <p class="sl-body my-5">
                        A whistleblower is an employee that disclose information that he or she reasonably believes violates state or federal law; or local, state or federal rule or regulation; or involves employee safety or health. An employer may not retaliate against an employee who is a whistleblower, or against an employee that refuses to participate in an activity that he or she believes would result in violation of state or federal laws.
                    </p>
                    <a class="primary-color text-whitetext-dn" href="{{ url('/') }}">
                        LEARN MORE ABOUT Whistleblower Protections
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="sec-right">
                    <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2022/05/p-1.webp" alt="">
                </div>
            </div>
        </div>
    </div>

</section>

<style>
    .pd-section .sec-right {
        padding: 20px 100px 20px 100px;
    }
    .pd-section .sec-right .sl-heading {
        font-size: 40px;
        line-height: 1.2;
    }
    .pd-section .sec-right .sl-body {
        color: #a4a2a2;
        line-height: 2;
        font-weight: 300;
    }
    .pd-section .sec-left img {
        width: 100%;
    }
    @media only screen and (max-width: 768px) {
        .pd-section .sec-right {
            padding: 30px 30px !important;
        }
        .pd-section .sec-right a {
            font-size: 12px;
        }
    }
</style>

<section class="pd-section">
    <div class="container">
        <div class="row g-0 py-5">
            <div class="col-12 col-md-5">
                <div class="sec-left">
                    <img class="img-fluid" src="https://avlonilaw.com/wp-content/uploads/2022/05/p-3.webp" alt="">
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="sec-right">
                    <h3 class="sl-heading tinos-regular">
                        Pregnancy Discrimination
                    </h3>
                    <p class="sl-body my-5">
                        If you are pregnant, have been pregnant, or may become pregnant you are protected against pregnancy based harassment at work under California state laws. If your employer has 5 or more employees, you are then also protected against pregnancy discrimination at work, have a legal right to work adjustments that will allow you to do your job without jeopardizing your health, and have a right to take up to 4 months of protected leave under California’s Pregnancy Disability Leave Law and 12-weeks under the California Family Rights Act and the Family and Medical Leave Act.
                    </p>
                    <a class="primary-color text-whitetext-dn" href="{{ url('/') }}">
                        LEARN MORE ABOUT Pregnancy Discrimination
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .contactus-section {
        background-image: url("https://avlonilaw.com/wp-content/uploads/2022/05/contact_cta-scaled.webp");
        position: relative;
        padding-bottom: 70px;
        padding-top: 70px;
        background-size: cover;
    }
    .contactus-section:before {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(234,229,226,.85);
        content: "";
    }
    .contactus-section .cta-box h3 {
        font-size: 30px;
    }
    .contactus-section .cta-box p {
        color: #a4a2a2;
        line-height: 2;
        font-weight: 300;
        margin: 40px 0px;
    }
    .contactus-section .cta-box {
        position: relative;
        z-index: 1;
        padding-bottom: 70px;
        padding-left: 60px;
        padding-right: 60px;
        padding-top: 70px;
        background-color: #fff;
    }
</style>
<div class="contactus-section">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-3 col-md-6">
                <div class="cta-box text-center">
                    <h3 class="tinos-regular">
                        Contact Us For Legal Help
                    </h3>
                    <p>
                        After you contact us for legal help, one of our team members will contact you to begin the intake process. During the intake process, we will collect details about your issue and work with you to identify what type of legal help you may need. During this process, we will offer representation or refer you to a firm that may better suit your needs.
                    </p>
                    <a class="primary-bg-color text-white text-center py-2 px-5 text-dn" href="http://trust_law.test">CONTACT US</a>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('footer-js')
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            // autoplay: {
            //     delay: 15000,
            // },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
    <script>
        function downloadCatalog(pdfUrl, title) {
            // Create an anchor element
            var link = document.createElement('a');
            link.href = pdfUrl;
            link.download = title + '.pdf'; // Set the filename for the download
            link.target = '_blank'; // Open the PDF in a new tab
            document.body.appendChild(link);
            link.click(); // Simulate a click event to trigger the download
            document.body.removeChild(link); // Clean up the anchor element
        }
    </script>
    <script>
        function openTab(tabName) {
            console.log(tabName);
            $('.custom-tabcontent').hide()
            $('.tablinks').removeClass('active')
            $('#' + tabName).show()
            $('.' + tabName).addClass('active')
            // $('[onclick=\'openTab("' + tabName + '")\']').addClass('active')
        }

        $(document).ready(function() {
            // Get the element with id="defaultOpen" and click on it
            $('#defaultOpen').click()
        })
    </script>
@endpush
