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
                        <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                            <div class="banner-content content-padding">
                                <h2 class="banner-title">Pilih Metode Pembayaran</h2>
                                <div class="card-group justify-content-center">
                                    @foreach ($channels as $channel)
                                    @if ($channel->active)
                                    <form action="{{ route('transaction.store') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="film_id" id="" value="{{ $film->id }}">
                                        <input type="hidden" name="code_id" id="" value="{{ $channel->code }}">
                                        {{-- <input type="hidden" name="bioskop_id" id="" value="{{ $bioskop }}"> --}}
                                        <button type="submit" class="card m-2 text-center">
                                            <div class="m-2 ">
                                                <img src="{{ $channel->icon_url }}" height="80px" width="80px"
                                                    class="card-img-top" alt="{{ $channel->name }}">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"> Bayar Dengan </h5>
                                                <h5 class="card-title"> {{ $channel->name }} </h5>
                                            </div>
                                        </button>
                                    </form>
                                    @endif
                                    @endforeach
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