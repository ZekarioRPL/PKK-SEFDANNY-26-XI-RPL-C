<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="canonical" href="/https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link href="/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.css">
    <!-- Icofont Css -->
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="/plugins/animate-css/animate.css">
    <!-- Icofont -->
    <link rel="stylesheet" href="/plugins/icofont/icofont.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    @include('layouts.header')


    <!--MAIN BANNER AREA START -->
    <div class="banner-area banner-3">
        <div class="overlay dark-overlay"></div>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 m-auto text-center col-sm-12 col-md-12">
                            <div class="banner-content content-padding">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="card">
                                            <div class="card-body text-left m-1">
                                                <h4 class="banner-title text-dark border-bottom">Detail Transaksi</h4>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h5 class="banner-title text-dark mt-4"
                                                            style="margin-bottom: -20px;">ID Transaksi</h5>
                                                        <h5 class="banner-title text-secondary">{{ $detail->merchant_ref }}</h5>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="banner-title text-dark text-right">{{ $detail->tanggalPembelian }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <h5 class="banner-title text-dark" style="margin-bottom: -20px;">Nama
                                                    Film</h5>
                                                <h5 class="banner-title text-secondary">{{ $detail->film->name }}</h5>

                                                <h5 class="banner-title text-dark" style="margin-bottom: -20px;">Nama
                                                    Bioskop</h5>
                                                <h5 class="banner-title text-secondary">{{ $detail->bioskop->name }}</h5>

                                                <h5 class="banner-title text-dark" style="margin-bottom: -20px;">Nama
                                                    User</h5>
                                                <h5 class="banner-title text-secondary">{{ $detail->user->name }}</h5>

                                                <h1 class="banner-title text-dark ml-4 mt-4">A02</h1>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body text-left">
                                                <h5 class="banner-title text-dark border-bottom">Total Pembayaran</h5>

                                                <h5 class="banner-title text-dark" style="margin-bottom: -20px;">Harga
                                                </h5>
                                                <h5 class="banner-title text-secondary">{{ $detail->amount }}</h5>

                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <span class="badge badge-danger p-2 text-right">{{ $detail->status }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--MAIN HEADER AREA END -->

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Woow animtaion -->
    <script src="plugins/counterup/wow.min.js"></script>
    <script src="plugins/counterup/jquery.easing.1.3.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="plugins/google-map/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>
    <!-- Contact Form -->
    <script src="plugins/jquery/contact.js"></script>
    <script src="js/custom.js"></script>
    {{-- Script --}}
</body>

</html>