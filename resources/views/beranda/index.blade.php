@extends('layouts.main')
@section('container')


<!-- ABOUT AREA -->
<section id="intro" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="section-heading">
                    <p class="lead">New Movies</p>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-lg-5  d-none d-lg-block col-sm-12">
                <div class="intro-box">
                    <span>01.</span>
                </div>
                <div class="intro-img">
                    <img src="image.jpg" alt="intro-img" class="img-fluid">
                </div>
            </div> --}}

            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="row">
                    @foreach ($films as $film)
                    <div class="col-lg-4 col-sm-4 col-md-4">
                        <div class="intro-box">
                            <span>02.</span>
                        </div>
                        <a href="/{{ $film->id }}">
                            <img src="{{ asset('storage/' . $film->file) }}" alt="{{ $film->name }}" height="250"
                                weight="400">
                        </a>
                    </div>
                    @endforeach

                </div>
                <hr>
            </div>
        </div>
    </div>
</section>
<!--  ABOUT AREA END  -->
<!--  SERVICE PARTNER START  -->
<section id="service-head" class=" bg-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading text-white">
                    <h4 class="section-title">Semua Film</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  SERVICE PARTNER END  -->

<!--  SERVICE AREA START  -->
<section id="service">
    <div class="container">
        <div class="row">
            @foreach ($films as $film)
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="service-box">
                    <a href="/{{ $film->id }}">
                        <img src="{{ asset('storage/' . $film->file) }}" alt="service-icon" class="img-fluid"
                            alt="{{ $film->name }}">
                    </a>
                    <div class="service-inner">
                        <h4>{{ $film->name }}</h4>
                        <p>{{ $film->genre }}</p>
                        <p>{{ $film->duration }} Minutes</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--  SERVICE AREA END  -->

{{--
<!--  SERVICE BLOCK2 START  -->
<section id="service-2" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="service-box-2">
                    <span>01</span>
                </div>
                <img src="image.jpg" alt="intro-img" height="250" weight="400">
                <h4>Judul Film</h4>
                <p>99 menit</p>
                <p>12+</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-box-2">
                    <span>01</span>
                </div>
                <img src="image.jpg" alt="intro-img" height="250" weight="400">
                <h4>Judul Film</h4>
                <p>99 menit</p>
                <p>12+</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-box-2">
                    <span>01</span>
                </div>
                <img src="image.jpg" alt="intro-img" height="250" weight="400">
                <h4>Judul Film</h4>
                <p>99 menit</p>
                <p>12+</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="service-box-2">
                    <span>01</span>
                </div>
                <img src="image.jpg" alt="intro-img" height="250" weight="400">
                <h4>Judul Film</h4>
                <p>99 menit</p>
                <p>12+</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-box-2">
                    <span>01</span>
                </div>
                <img src="image.jpg" alt="intro-img" height="250" weight="400">
                <h4>Judul Film</h4>
                <p>99 menit</p>
                <p>12+</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-box-2">
                    <span>01</span>
                </div>
                <img src="image.jpg" alt="intro-img" height="250" weight="400">
                <h4>Judul Film</h4>
                <p>99 menit</p>
                <p>12+</p>
            </div>
        </div>
    </div>
</section>
<!--  SERVICE BLOCK2 END  --> --}}

@endsection