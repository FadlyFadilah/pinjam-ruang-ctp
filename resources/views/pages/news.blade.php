@extends('layouts.default')
@section('content')
    <div class="owl-carousel">
        @foreach ($contentPages as $cp)
            <div class="jumbotron jumbotron-fluid"
                style="background-image: url('{{ $cp->featured_image->getUrl() }}'); background-size: cover;background-repeat: no-repeat;background-position: center center;">
                <div class="container">

                    <div>
                        <span class="strong">
                            <a class="text-uppercase mr-2" href="https://www.cimahitechnopark.id/category/animasi">
                                <span style="border-left: 5px solid; padding-left: 5px;">Animasi</span>
                            </a>
                        </span>
                        <h1 class="display-4 text-white">{{ $cp->title }}</h1>

                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="#" role="button">Lihat Lebih Banyak</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <section class="ftco-section bg-light" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="bg-light">
            <div class="container">
                <div class="row align-items-center">
                    @foreach ($contentPages as $cpa)
                        <div class="col-lg-3 mt-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top"
                                    src="{{ $cpa->featured_image->getUrl() }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cpa->title }}</h5>
                                    <p class="card-text">{!! substr($cpa->page_text, 0, 100) . '...' !!}</p>
                                    <a href="#" class="btn btn-link">Lihat Lebih Banyak</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
