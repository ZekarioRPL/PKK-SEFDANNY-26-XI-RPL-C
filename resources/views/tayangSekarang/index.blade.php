@extends('layouts.main')
@section('container')

<!--  SERVICE PARTNER START  -->
<?php
$tgl = $tanggal;
$day = date('D', strtotime($tgl));
$dayList = array(
'Sun' => 'Minggu',
'Mon' => 'Senin',
'Tue' => 'Selasa',
'Wed' => 'Rabu',
'Thu' => 'Kamis',
'Fri' => 'Jumat',
'Sat' => 'Sabtu'
);
?>
<!--  SERVICE PARTNER START  -->
<section id="service-head" class=" bg-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 m-auto">
                <div class="section-heading text-white">
                    <h4 class="section-title">Tayang Sekarang</h4>
                    <h4><?php echo $dayList[$day]; ?>, {{ $tanggal }}</h4>
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
                {{-- @if($tanggal >= $film->jadwalPenayangan && $tanggal <= $film->jadwalPenutupan) --}}

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="service-box">
                        <img src="{{ asset('storage/' . $film->file) }}" alt="service-icon" class="img-fluid"
                        alt="{{ $film->name }}">
                        <div class="service-inner">
                            <h4>{{ $film->name }}</h4>
                            <p>{{ $film->genre }}</p>
                            <p>{{ $film->duration }} Minutes</p>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}

                @endforeach
            </div>
        </div>
    </section>
    <!--  SERVICE AREA END  -->

@endsection