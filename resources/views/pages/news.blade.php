@extends('layouts.default')
@section('content')
    <div class="owl-carousel">
        @foreach ($contentPages as $cp)
            <div class="hero-wrap js-fullheight">
                <div class="background-overlay" style="background-image: url('{{ $cp->featured_image->getUrl() }}')"></div>
                <div class="container">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                        data-scrollax-parent="true">
                        <div class="col-md-7 ftco-animate">
                            <span class="strong">
                                <a class="text-uppercase mr-2" href="https://www.cimahitechnopark.id/category/animasi">
                                    @foreach ($cp->categories as $categori)
                                        <span
                                            style="border-left: 5px solid; padding-left: 5px;">{{ $categori->name }}</span>
                                    @endforeach
                                </a>
                            </span>
                            <h1 class="display-4 text-white"
                                style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600;">{{ $cp->title }}
                            </h1>

                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="{{ route('news.show', $cp->title) }}"
                                    role="button">Lihat Lebih Banyak</a>
                            </p>
                        </div>
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
                    @foreach ($contentPagesAll as $cpa)
                        <div class="col-md-6 col-lg-3 mt-4">
                            <div class="card" style="width: 18rem;" style="height: 500px;">
                                <img class="card-img-top" src="{{ $cpa->featured_image->getUrl() }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cpa->title }}</h5>
                                    <p class="card-text">{!! substr($cpa->page_text, 0, 100) . '...' !!}</p>
                                    <a href="{{ route('news.show', $cpa->title) }}" class="btn btn-link">Lihat Lebih
                                        Banyak</a>
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
                autoplayTimeout: 7000,
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
