@extends('layouts.default')
@section('content')
<div class="hero-wrap js-fullheight">
    <div class="background-overlay" style="background-image: url(vendor/technext/vacation-rental/images/bg_1.jpg);"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md ftco-animate">
                <h1 class="text-center" style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600;">Contact Us</h1>
                <h2 class="text-center" style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; color:white;">UPTD Cimahi Technopark</h2>
            </div>
        </div>
    </div>
</div>

    <section class="ftco-section bg-light" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-4 col-md-push-8 animate-box fadeInUp animated-fast">
                    <h2 style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600;">Contact Information</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-info-wrap-flex">
                                <div class="con-info">
                                    <p><span><i class="icon-location-2"></i></span>Jl. Baros Utama No.78, Leuwigajah, Kec.
                                        Cimahi Sel., <br>Kota Cimahi, Jawa Barat 40532</p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-phone3"></i></span> <a href="tel://(022) 86121025">(022)
                                            86121025</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-globe"></i></span> <a
                                            href="http://www.cimahitechnopark.id/">cimahitechnopark.id</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-md-pull-4 animate-box fadeInUp animated-fast">
                    <h2 style="font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600;">Get In Touch</h2>
                    <form action="#" method="">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" id="fname" class="form-control" placeholder="Your firstname"
                                    name="fname">
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="lname" class="form-control" placeholder="Your lastname"
                                    name="lname">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="text" id="email" class="form-control" placeholder="Your email address"
                                    name="email">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="text" id="subject" class="form-control"
                                    placeholder="Your subject of this message" name="subject">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                    placeholder="Say something about us" name="message"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>
                    </form>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.640535611377!2d107.5367378!3d-6.9013502!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e517e85e24c5%3A0x9e6a5f1176038914!2sCimahi%20Techno%20Park!5e0!3m2!1sen!2sid!4v1680137464508!5m2!1sen!2sid"
                                    height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
