<!-- <title>Pinjam CTP</title> -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>Pelita Technopark</title>
<link rel="shortcut icon" href="{{ asset('LOGO.jpeg') }}" type="image/x-icon">

<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/technext/vacation-rental/css/animate.css') }}">


<link rel="stylesheet" href="{{ asset('vendor/technext/vacation-rental/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/technext/vacation-rental/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/technext/vacation-rental/css/magnific-popup.css') }}">

<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('vendor/technext/vacation-rental/css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/technext/vacation-rental/css/jquery.timepicker.css') }}">

<link rel="stylesheet" href="{{ asset('vendor/technext/vacation-rental/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/technext/vacation-rental/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<style>
 

    .background-overlay  {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    filter: brightness(60%); /* ganti nilai 10 dengan nilai yang diinginkan */
    }



    h1, h2, h3, h4, h5, h6, .heading {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
    }
    body, p, a {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
    }
    .navbar-toggler-icon {
        background-color: gray;
    }
    
    .img-container {
    width: 100%;
    height: 100%; /* Ubah tinggi sesuai kebutuhan Anda */
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    transition: transform 0.3s ease;
    }

    .img-container img {
    max-width: 100%;
    height: auto;
    transition: transform 0.3s ease;
    }

    .img-container:hover {
    transform: translateY(-5px);
    }

    .img-container:hover img {
    transform: scale(1.1) translate(0, -5px);
    }

    .overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40%;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    color: #fff;
    padding: 20px;
    transition: opacity 0.3s ease;
    }

    .overlay-content {
    text-align: left;
    }

    .overlay h3 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    }

    .overlay p {
    margin-bottom: 10px;
    }

    .overlay i {
    font-size: 20px;
    }


</style>
@yield('styles')