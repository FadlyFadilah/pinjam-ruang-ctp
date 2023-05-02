@extends('layouts.default')
@section('content')
    <div class="owl-carousel">
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url('{{ $contentPage->featured_image->getUrl() }}'); background-size: cover;background-repeat: no-repeat;background-position: center center;">
            <div class="container">

                <div>
                    <span class="strong">
                        <a class="text-uppercase mr-2" href="https://www.cimahitechnopark.id/category/animasi">
                            <span style="border-left: 5px solid; padding-left: 5px;">Animasi</span>
                        </a>
                    </span>
                    <h1 class="display-4 text-white">{{ $contentPage->title }}</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section bg-light" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4">{{ $contentPage->title }}</h1>
                        <p class="lead text-muted mb-0">
                            {!! $contentPage->page_text !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 3,
                autoHeight: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    768: {
                        items: 1,
                        nav: false
                    },
                    992: {
                        items: 1,
                        nav: false
                    }
                }
            });
        });
    </script>
@endsection
