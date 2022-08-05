@extends('layouts.main')
@section('container')
<!--  SERVICE PARTNER START  -->
<section id="service-head" class=" bg-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading text-white">
                    <h4 class="section-title">Daftar Bioskop</h4>
                    <h4>12:00:00 09:11 AM</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  SERVICE PARTNER END  -->
<!--  SERVICE BLOCK2 START  -->
<section id="service-2" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($bioskops as $bioskop)
                
            <div class="col-lg-4 col-md-6">
                <div class="service-box-2">
                    <span>{{ $loop->iteration }}</span>
                </div>
                <a href="/bioskop/{{ $bioskop->id }}">
                    <img src="{{ asset('storage/' . $bioskop->file) }}" alt="intro-img" height="250" weight="400">
                </a>
                <h4>{{ $bioskop->name }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--  SERVICE BLOCK2 END  -->

@endsection